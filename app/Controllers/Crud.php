<?php

namespace App\Controllers;

    use App\Models\CrudModel;

class Crud extends BaseController{

    public function index(){

        $Crud = new CrudModel();
        $datos = $Crud->listarNombres();

        $data = [
            "datos" => $datos,
        ];
        return view('listado',$data);
    }

    public function crear(){
        $datos = [
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido']
        ];
        $Crud = new CrudModel();
        $respuesta = $Crud->insertar($datos);
    }

    public function actualizar(){
        $datos = [
                "nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellido']
        ];
        $idNombre = $_POST['idNombre'];

        $Crud = new CrudModel();

        $respuesta = $Crud->actualizar($datos, $idNombre);
    }

    public function obtenerNombre($idNombre){
        $data = ["id_nombre" => $idNombre];
        $Crud = new CrudModel();
        $respuesta = $Crud->obtenerNombre($data);

        $datos = ["datos" => $respuesta];

        return view('actualizar',$datos);


    }

    public function eliminar($idNombre){
        $Crud = new CrudModel();
        $data = ['id_nombre' => $idNombre];

        $respuesta = $Crud->eliminar($data);
    
    }

}