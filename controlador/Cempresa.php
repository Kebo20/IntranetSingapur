<?php

require_once '../cado/ClaseEmpresa.php';


switch ($_GET["op"]) {


    case "listar":
        $oempresa1 = new Empresa();
        $lista = $oempresa1->Listar();

        $datos["data"] = array();
        $cont = 0;
        foreach ($lista as $empresa) {
            $cont ++;

            $subArray = array();

            $subArray[] = $cont;

            $subArray[] = $empresa["nombre"];
            $subArray[] = $empresa["ruc"];

            $subArray[] = $empresa["direccion"];
            $subArray[] = $empresa["telefono"];
            $subArray[] = $empresa["pass"];
            $subArray[] = $empresa["representante"];
            $subArray[] = $empresa["dni"];
            $subArray[] = $empresa["cell"];

            if ($empresa["estado"] == "ACTIVO") {
                $subArray[] = "<input type='checkbox' checked='checked' disabled='disabled'  />";
            } else {
                $subArray[] = "<input type='checkbox'  disabled='disabled'  />";
            }


            $subArray[] = "<a  onclick=\"editar('" . $empresa["id"] . "','" . $empresa["ruc"] . "','" . $empresa["nombre"] .
                    "','" . $empresa["estado"] . "','" . $empresa["direccion"] . "','" . $empresa["telefono"] . "','" .
                    $empresa["pass"] . "','" . $empresa["representante"] . "','" . $empresa["dni"] . "','" . $empresa["cell"] .
                    "' )\" class=\"btn btn-success btn-xs text-white\" ><i class='fa fa-pencil'></i> </a>" .
                    "<span>  </span><a  onclick=\"eliminar(" . $empresa["id"] . " )\" class=\"btn btn-danger btn-xs  text-white\" ><i class='fa fa-trash'></i></a>";


            $datos["data"][] = $subArray;
        }


        echo json_encode($datos);


        break;


    case "registrar":

        $oempresa2 = new Empresa();
        $ruc = $_POST["ruc"];
        $nombre = $_POST["nombre"];

        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $pass = $_POST["pass"];
        $representante = $_POST["representante"];
        $dni = $_POST["dni"];
        $cell = $_POST["cell"];
        $estado = $_POST["estado"];



        $insertar = $oempresa2->Registrar($nombre, $ruc, $estado, $direccion, $telefono, $pass, $representante, $dni, $cell);
        if ($insertar->rowCount() == 0) {
            echo 0;
        } else {
            echo 1;
        };
        exit;
        break;
    case "editar":
        $oempresa3 = new Empresa();
        $id = $_POST["id"];
        $ruc = $_POST["ruc"];
        $nombre = $_POST["nombre"];

        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $pass = ($_POST["pass"]);
        $representante = $_POST["representante"];
        $dni = $_POST["dni"];
        $cell = $_POST["cell"];
        $estado = $_POST["estado"];

        $insertar = $oempresa3->Editar($id, $ruc, $nombre, $estado, $direccion, $telefono, $pass, $representante, $dni, $cell);
        if ($insertar->rowCount() == 0) {
            echo 0;
        } else {
            echo 1;
        };
        exit;
        break;
    case "eliminar":
        $oempresa4 = new Empresa();
        $id = $_POST["id"];

        $result = $oempresa4->Eliminar($id);
        if ($result->rowCount() == 0) {
            echo 0;
        } else {
            echo 1;
        };
        exit;
        break;
    case 'CONSULTA_RUC' :

        require_once('../sunat/src/autoload.php');
        $company = new \Sunat\Sunat(false, false);
        $ruc = $_POST['ruc'];
        //$ruc="20330401991";
        $search1 = $company->search($ruc);
        $info = json_decode($search1->json(), true);
        if ($info['success'] == false) {
            echo 0;
            exit;
        }

        $datos = array(
            0 => $info['result']['ruc'],
            1 => $info['result']['razon_social'],
            2 => $info['result']['direccion'],
            3 => $info['result']['estado'],
        );
        echo json_encode($datos);


        break;
}


