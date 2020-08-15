<?php

require_once '../cado/ClaseDetalleServicio.php';


switch ($_GET["op"]) {


    case "listar":
        $oservicio1 = new DetalleServicio();
        $lista = $oservicio1->Listar($_GET["servicio"]);

        $datos["data"] = array();
        $cont = 0;
        foreach ($lista as $servicio) {
            $cont ++;

            $subArray = array();
            $subArray[] = $cont;
            $subArray[] = $servicio["nombre"];


            $subArray[] = "<a  onclick=\"editar('" . $servicio["id"] . "','" . $servicio["nombre"] .
                    "' )\" class=\"btn btn-success btn-xs text-white\" ><i class='fa fa-pencil'></i> </a>" .
                    "<span>  </span><a  onclick=\"eliminar(" . $servicio["id"] . " )\" class=\"btn btn-danger btn-xs  text-white\" ><i class='fa fa-trash'></i></a>";


            $datos["data"][] = $subArray;
        }

        echo json_encode($datos);


        break;


    case "registrar":

        $oservicio2 = new DetalleServicio();
        $nombre = $_POST["nombre"];
        $servicio = $_POST["servicio"];

        $insertar = $oservicio2->Registrar($nombre, $servicio);
        if ($insertar->rowCount() == 0) {
            echo 0;
        } else {
            echo 1;
        };
        exit;
        break;
    case "editar":
        $oservicio3 = new DetalleServicio();
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];

        $editar = $oservicio3->Editar($id, $nombre);
        if ($editar->rowCount() == 0) {
            echo 0;
        } else {
            echo 1;
        };
        exit;
        break;
    case "eliminar":
        $oservicio4 = new DetalleServicio();
        $id = $_POST["id"];

        $result = $oservicio4->Eliminar($id);
        if ($result->rowCount() == 0) {
            echo 0;
        } else {
            echo 1;
        };
        exit;
        break;
}



