<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VentasModel;
use App\Models\DetalleVentasModel;
use Dompdf\Dompdf;

class VentasController extends BaseController
{
    public function realizarVenta()
    {
        $ventasModel=new VentasModel();
        $detalleVentasModel=new DetalleVentasModel();

        $ventas=$this->request->getPost('tabla');

        // Sumando total de venta
        $total=0;
        foreach($ventas as $venta){
            // sumando subtotales que es posición 4 en la tabla de productos
            $total += $venta[4];
        }

        // REGISTRO DE VENTA
        $data=[
            'fecha' => date('Y-m-d'),
            'total' => $total,
            'usuario' => 'ADMIN'
        ];

        $ventasModel->insert($data);

        //DETALLE DE VENTA
        // obteniendo último id de venta
        $sql="SELECT * from ventas WHERE usuario='ADMIN' order by id DESC LIMIT 1";
        $query=$ventasModel->query($sql);
        $result=$query->getResultArray();
        $idVenta=0;
        foreach($result as $venta){
            $idVenta=$venta['id'];
        }

        foreach($ventas as $venta){
            $data=[
                'idVenta'=>$idVenta,
                'idProducto'=>$venta[0],
                'precioProducto'=>$venta[2],
                'cantidadProducto'=>$venta[3],
                'subtotal' => $venta[4]
            ];
            $detalleVentasModel->insert($data);
        }

        // Preparando respuesta para la petición AJAX
        echo json_encode(array(
            "registro" => 0,
            "redireccion" => base_url() . "formularioVenta")
        );
    }

    function formularioVenta(){
        return view('ventas/venta');
    }

    function generarReporte(){
        /* GENERANDO CONSULTA A LA BD */
        $ventasModel = new VentasModel();
        $sql="SELECT fecha,total,usuario,precioProducto,cantidadProducto,subtotal,nombre
        FROM ventas
        INNER JOIN detalleventas ON idVenta=ventas.id
        INNER JOIN productos ON idProducto=productos.id";
        $query=$ventasModel->query($sql);
        $result = $query->getResultArray();

        $estiloTabla="<style>
            table {
                border-collapse: collapse;
                width: 100%;
                border: black 2px solid;
            }
            td, th {
                border: black 1px solid;
            }
            tr{
                text-align: center;
            }
        </style>";

        $tablaVentas="";
        $tablaVentas .= $estiloTabla;

        $tablaVentas .="<table>
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>TOTAL</th>
                    <th>USUARIO</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>SUBTOTAL</th>
                    <th>PRODUCTO</th>
                </tr>
            </thead>
            <tbody>";

        foreach($result as $venta){
            $tablaVentas.="<tr>
                <td>".$venta['fecha']."</td>
                <td>".$venta['total']."</td>
                <td>".$venta['usuario']."</td>
                <td>".$venta['precioProducto']."</td>
                <td>".$venta['cantidadProducto']."</td>
                <td>".$venta['subtotal']."</td>
                <td>".$venta['nombre']."</td>
            </tr>";
        }

        $tablaVentas.="</tbody>
        </table>";

        $reporte="<center><h3>RECIBO</h3></center>";
        $reporte.="</br>";

        $reporte.=$tablaVentas;


        /* CREANDO PDF */
        $dompdf=new Dompdf();
        $dompdf->loadHtml($reporte);

        $dompdf->setPaper('A4','portrait'); //portrait es vertical y landscape es horizontal

        $dompdf->render();

        $dompdf->stream();
    }

}
