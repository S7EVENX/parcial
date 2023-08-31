<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/productos.models.php");
error_reporting(0);

$productos = new productos;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $productos->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $id = $_POST["id"];
        $datos = array();
        $datos = $productos->uno($id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
     
        $nombre = $_POST["nombre"];
        $descripción = $_POST["descripción"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $categoría_id = $_POST["categoría_id"];

        $datos = array();
        $datos = $productos->Insertar( $nombre, $descripción, $precio, $stock, $categoría_id);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripción = $_POST["descripción"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $categoría_id = $_POST["categoría_id"];
        $datos = array();
        $datos = $productos->Actualizar($id, $nombre, $descripción, $precio, $stock, $categoría_id);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $id = $_POST["id"];
        $datos = array();
        $datos = $productos->Eliminar($id);
        echo json_encode($datos);
        break;
}