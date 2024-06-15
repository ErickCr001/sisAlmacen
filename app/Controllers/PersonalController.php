<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PersonalModel;

class PersonalController extends BaseController
{
    public function formularioRegistro()
    {
        return view('personal/registrarPersonal');
    }

    public function registrarPersonal(){
        $ci=$this->request->getPost('ci');
        $nombre=$this->request->getPost('nombrePersonal');
        $paterno=$this->request->getPost('paterno');
        $materno=$this->request->getPost('materno');
        $celular=$this->request->getPost('celular');
        $direccion=$this->request->getPost('direccion');
        $codigo = substr($paterno,0,1).substr($materno,0,1).substr($nombre,0,1).$ci;
        $clave=password_hash($ci,PASSWORD_DEFAULT);
        $personalModel = new PersonalModel();
        $data=[
            'codigo' => $codigo,
            'ci' => $ci,
            'nombre' => $nombre,
            'paterno' => $paterno,
            'materno' => $materno,
            'celular' => $celular,
            'direccion' => $direccion,
            'clave' => $clave,
        ];

        $personalModel->insert($data);
        return redirect()->to('/listarPersonal');
        //echo "Personal registrado";
    }

    function listarPersonal(){
        $personalModel = new PersonalModel();
        $registros = $personalModel->findAll();

        $data=['personal'=>$registros];
        return view('personal/listarPersonal',$data);
    }

    function mostrarPersonal($id){
        $personalModel=new PersonalModel();
        $datosPersonal=$personalModel->find($id);
        $data=['personal' => $datosPersonal];
        return view('personal/datosPersonal',$data);
    }

    function modificarPersonal($id){
        $ci=$this->request->getPost('ci');
        $nombre=$this->request->getPost('nombrePersonal');
        $paterno=$this->request->getPost('paterno');
        $materno=$this->request->getPost('materno');
        $celular=$this->request->getPost('celular');
        $direccion=$this->request->getPost('direccion');
        $codigo = substr($paterno,0,1).substr($materno,0,1).substr($nombre,0,1).$ci;
        // $clave=password_hash($ci,PASSWORD_DEFAULT);

        $personalModel = new PersonalModel();
        $data=[
            'codigo' => $codigo,
            'ci' => $ci,
            'nombre' => $nombre,
            'paterno' => $paterno,
            'materno' => $materno,
            'celular' => $celular,
            'direccion' => $direccion
        ];
        $personalModel->update($id,$data);
        echo "Personal modificado";
        return redirect()->to('/listarPersonal');
    }

    function eliminarPersonal($id){
        $personalModel = new PersonalModel();
        $personalModel->delete($id);
        return redirect()->to('/listarPersonal');
        //echo "Personal eliminado";
    }

    function vistaLogin(){
        return view('Login/login');
    }

    function login(){
        $personalModel = new PersonalModel();

        // ALMACENANDO LOS DATOS QUE ENVIA LA VISTA EN VARIABLES
        $usuario = trim((string)$this->request->getPost("usuario"));
        $clave = $this->request->getPost("clave");

        // Preparando consulta para obtener datos de la BD
        $sql="SELECT clave from personal where codigo='$usuario'";
        // Ejecutando consulta
        $query=$personalModel->query($sql);
        // Obteniendo resultados de la consulta ejecutada
        $result = $query->getResultArray();

        // Verificando si existe resultados
        if(!$result){
            // Si no existe resultado de BD es porque no existe el usuario
            // se redirecciona a la misma página login con redirect()
            // back() hará que se vuelva a la pantalla login
            // with son variables que queremos se muestre en la pantalla login
            // En este ejemplo, estamos enviando la variable mensaje y su valor es un array()
            // que contiene un mensaje 'USuario o contraseña....'
            // y el otro valor es el tipo de mensaje (bootstrap tiene danger, warning, primary, secondary)
            // son los colores de bootstrap
            return redirect()->back()->with('mensaje',["Usuario o contraseña incorrecta","danger"]);
        }

        // en caso de existir resultado en BD, debemos leer los resultado
        // y comparar la clave de BD con la clave que el usuario ingresa
        foreach($result as $usr){
            $claveBd=$usr['clave']; // obteniendo el campo de BD
            // verificando contraseñas
            // la función password_verify se encarga de desencriptar la contraseña de BD y compararlo
            if(password_verify($clave,$claveBd)){
                // si coinciden las contraseñas, el login es correcto
                // creamos variables de sesión
                // las variables de sesión están presentes en todo el ciclo que se maneje el sistema
                $session = session(); // con esto indicamos que vamos a almacenar variables de sesión
                $session->set('usuario',$usuario); // estamos creando una variable de sesión llamado 'usuario' y su valor es la variable $usuario
                // Como el login es correcto, redireccionamos hacia la ruta del formulario de venta
                return redirect()->to('/formularioVenta');
            }
            else{
                // En caso de no coincidir, retornamos a la pantalla login
                return redirect()->back()->with('mensaje',["Usuario o contraseña incorrecta","danger"]);
            }
        }

    }
}
