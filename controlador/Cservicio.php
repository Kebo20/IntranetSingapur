<?php

require_once '../cado/ClaseServicio.php';


switch ($_GET["op"]) {


    case "listar":
        $oservicio1 = new Servicio();
        $lista = $oservicio1->Listar();

        $datos["data"] = array();
        $cont = 0;
        foreach ($lista as $servicio) {
            $cont ++;

            $subArray = array();

            $subArray[] = $cont;

            $subArray[] = $servicio["nombre"];


            if ($servicio["estado"] == "0") {
                $subArray[] = "<input type='checkbox' checked='checked' disabled='disabled'  />";
            } else {
                $subArray[] = "<input type='checkbox'  disabled='disabled'  />";
            }

            $subArray[] = "<a class='btn btn-xs text-white' href='#' onclick='Detalle(".$servicio["id"].")'><i class='fa fa-search'></i></a>";
            $subArray[] = "<a  onclick=\"editar('" . $servicio["id"] . "','" . $servicio["nombre"] . "','" . $servicio["estado"] .
                    "' )\" class=\"btn btn-success btn-xs text-white\" ><i class='fa fa-pencil'></i> </a>" .
                    "<span>  </span><a  onclick=\"eliminar(" . $servicio["id"] . " )\" class=\"btn btn-danger btn-xs  text-white\" ><i class='fa fa-trash'></i></a>";


            $datos["data"][] = $subArray;
        }


        echo json_encode($datos);


        break;


    case "registrar":

        $oservicio2 = new Servicio();
        $nombre = $_POST["nombre"];
        $estado = $_POST["estado"];



        $insertar = $oservicio2->Registrar($nombre, $estado);
        if ($insertar->rowCount() == 0) {
            echo 0;
        } else {
            echo 1;
        };
        exit;
        break;
    case "editar":
        $oservicio3 = new Servicio();
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $estado = $_POST["estado"];

        $editar = $oservicio3->Editar($id, $nombre, $estado);
        if ($editar->rowCount() == 0) {
            echo 0;
        } else {
            echo 1;
        };
        exit;
        break;
    case "eliminar":
        $oservicio4 = new Servicio();
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



