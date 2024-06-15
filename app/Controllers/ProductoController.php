<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    public function formularioRegistro()
    {
        return view('productos/registrarProducto');
    }

    public function registrarProducto(){
        /* echo "Llega";
        var_dump($this->request); */
        $nombre=$this->request->getPost('nombreProducto');
        $industria=$this->request->getPost('industriaProducto');// select
        $cantidad=$this->request->getPost('cantidadProducto');
        $envase=$this->request->getPost('envaseProducto');// radiobuttons
        $precio_compra=$this->request->getPost('pCompraProducto');
        $precio_venta=$this->request->getPost('pVentaProducto');
        $delivery_entrega=$this->request->getPost('deliveryProducto'); //checkbox
        $tienda_entrega=$this->request->getPost('tiendaProducto'); //checkbox

        // definiendo cual checkbox fue seleccionado
        $tipo_entrega="";
        if($delivery_entrega!=""){
            $tipo_entrega.=$delivery_entrega."|";
        }
        if($tienda_entrega!=""){
            $tipo_entrega.=$tienda_entrega."|";
        }
        // strlen retorna el tamaño de una cadena de texto
        if(strlen($tipo_entrega)>0){
            // armamos la cadena de texto quitando el último caracter
            $tipo_entrega=substr($tipo_entrega,0,strlen($tipo_entrega)-1);
        }

        // almacenando fotografía
        $archivoFoto=$this->request->getFile('fotoProducto');

        // isValid verificar si el archivo es válido
        // hasMoved verifica si el archivo puede ser copiado
        if ($archivoFoto->isValid() && ! $archivoFoto->hasMoved()) {
            //  asignando nuevo nombre al archivo entrante
            $nuevoNombre = $archivoFoto->getRandomName();
            // moviendo el archivo dentro de la carpeta uploads con el nuevo nombre
            // la carpeta uploads se va crear de manera automática
            // dentro de la carpeta public
            // Porque es la única carpeta a la que se puede acceder desde el navegador
            $archivoFoto->move(ROOTPATH . 'public/uploads', $nuevoNombre);
            // en variable foto almacenamos la ruta de guardado de la fotografia
            $foto="uploads/$nuevoNombre";
        }
        /* echo "$tipo"; */

        // ARMANDO CODIGO
        $codigo=substr($nombre,0,1).$industria;

        // instanciando al modelo
        // Verificar en la parte superior que se esté direccionando hacia los modelos
        $productoModel = new ProductoModel();

        // Armando array para insertar datos a BD
        $data=[
            'codigo'=>$codigo,
            'nombre'=>$nombre,
            'industria'=>$industria,
            'cantidad'=>$cantidad,
            'envase'=>$envase,
            'precio_compra'=>$precio_compra,
            'precio_venta'=>$precio_venta,
            'tipo_entrega'=>$tipo_entrega,
            'foto'=>$foto,
        ];

        // Insertando a la BD
        $productoModel->insert($data);

        echo "Producto registrado";
    }

    function listarProductos(){
        // Debemos instanciar un objeto del modelo de Productos
        $productoModel = new ProductoModel();

        // A través del modelo, obtenemos los productos registrados en BD
        // el método findAll() trae todos los registros de una tabla con la que el modelo
        // esté trabajando, lo trae en formato de array
        $productosRegistrados=$productoModel->findAll();

        // A la vista le devolvemos los registros en un array llamado productos
        $data=['productos' => $productosRegistrados];

        // Retornamos la vista con los datos registrados en BD
        return view('productos/listarProducto',$data);
    }

    // Función que retorna los datos de BD de un producto por ID
    function mostrarProducto($id){
        // Debemos instanciar un objeto del modelo de Productos
        $productoModel = new ProductoModel();

        // utilizamos el método find pasándo como parámetro el ID de producot
        // que necesitamos mostrar
        $datosProducto = $productoModel->find($id);

        $data = ['producto'=>$datosProducto];

        return view('productos/datosProducto',$data);
    }

    function modificarProducto($id){
        $nombre=$this->request->getPost('nombreProducto');
        $industria=$this->request->getPost('industriaProducto');// select
        $cantidad=$this->request->getPost('cantidadProducto');
        $envase=$this->request->getPost('envaseProducto');// radiobuttons
        $precio_compra=$this->request->getPost('pCompraProducto');
        $precio_venta=$this->request->getPost('pVentaProducto');
        $delivery_entrega=$this->request->getPost('deliveryProducto'); //checkbox
        $tienda_entrega=$this->request->getPost('tiendaProducto'); //checkbox

        // definiendo cual checkbox fue seleccionado
        $tipo_entrega="";
        if($delivery_entrega!=""){
            $tipo_entrega.=$delivery_entrega."|";
        }
        if($tienda_entrega!=""){
            $tipo_entrega.=$tienda_entrega."|";
        }
        // strlen retorna el tamaño de una cadena de texto
        if(strlen($tipo_entrega)>0){
            // armamos la cadena de texto quitando el último caracter
            $tipo_entrega=substr($tipo_entrega,0,strlen($tipo_entrega)-1);
        }

        // almacenando fotografía
        $archivoFoto=$this->request->getFile('fotoProducto');

        // isValid verificar si el archivo es válido
        // hasMoved verifica si el archivo puede ser copiado
        if ($archivoFoto->isValid() && ! $archivoFoto->hasMoved()) {
            //  asignando nuevo nombre al archivo entrante
            $nuevoNombre = $archivoFoto->getRandomName();
            // moviendo el archivo dentro de la carpeta uploads con el nuevo nombre
            // la carpeta uploads se va crear de manera automática
            // dentro de la carpeta public
            // Porque es la única carpeta a la que se puede acceder desde el navegador
            $archivoFoto->move(ROOTPATH . 'public/uploads', $nuevoNombre);
            // en variable foto almacenamos la ruta de guardado de la fotografia
            $foto="uploads/$nuevoNombre";
        }
        /* echo "$tipo"; */

        // ARMANDO CODIGO
        $codigo=substr($nombre,0,1).$industria;

        // instanciando al modelo
        // Verificar en la parte superior que se esté direccionando hacia los modelos
        $productoModel = new ProductoModel();

        // Armando array para insertar datos a BD
        $data=[
            'codigo'=>$codigo,
            'nombre'=>$nombre,
            'industria'=>$industria,
            'cantidad'=>$cantidad,
            'envase'=>$envase,
            'precio_compra'=>$precio_compra,
            'precio_venta'=>$precio_venta,
            'tipo_entrega'=>$tipo_entrega,
            'foto'=>$foto,
        ];

        // Modificando a la BD
        $productoModel->update($id,$data);

        echo "Producto modificado";
    }

    function eliminarProducto($id){
        $productoModel=new ProductoModel();
        $productoModel->delete($id);
        echo "Producto eliminado";
    }
}
