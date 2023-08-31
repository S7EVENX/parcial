<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class productos
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "select * from productos";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM productos WHERE id = $id";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($nombre, $descripción, $precio, $stock, $categoría_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into productos(nombre,descripción,precio,stock,categoría_id) values ( '$nombre', '$descripción', '$precio', $stock,  $categoría_id)";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($id, $nombre, $descripción, $precio, $stock, $categoría_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update productos set nombre='$nombre',descripción='$descripción',precio='$precio',stock=$stock,categoría_id=$categoría_id where id= $id";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from productos where id = $id";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}