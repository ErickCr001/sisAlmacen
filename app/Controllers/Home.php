<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function saludar(){
        echo "Saludando...";
    }

    public function saludarPersona($nombre){
      
        echo "Hola $nombre";
    }

    public function verDashboard(){
        /* return view('layouts/dashboard'); */
        return view('productos/listar');
    }
}
