<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/categorías.models.php");
error_reporting(0);

$categorías = new categorías;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $categorías->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $id = $_POST["id"];
        $datos = array();
        $datos = $categorías->uno($id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
      
        $nombre = $_POST["nombre"];
        $descripción = $_POST["descripción"];

        $datos = array();
        $datos = $categorías->Insertar( $nombre, $descripción);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripción = $_POST["descripción"];
        $datos = array();
        $datos = $categorías->Actualizar($id, $nombre, $descripción);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $id = $_POST["id"];
        $datos = array();
        $datos = $categorías->Eliminar($id);
        echo json_encode($datos);
        break;
}