<?php
include("../../controller/exe.php");

function get_personal()
{
	$sql = "SELECT id, nombre, area
				FROM personal
			WHERE status = 1";
	$result = querys($sql);
	return $result;
}

function get_productos()
{
	$sql = "SELECT id, nombre, descripcion, unidad
				FROM productos
			WHERE 1";
	$result = querys($sql);
	return $result;
}

function update_producto($nombre, $descripcion, $unidad)
{
	$sql = "UPDATE productos SET nombre ='".$nombre."', descripcion = '".$descripcion."', unidad = '".$unidad."'";
	$result = querys($sql);
	return $result;
}

function create_producto($nombre, $descripcion, $unidad)
{
	$sql = "INSERT INTO productos(nombre, descripcion, unidad, status)
			VALUES (".$nombre.", ".$descripcion.",".$unidad.")";
	$result = querys($sql);
	return $result;
}

function update_producto_status($id)
{
	$sql = "UPDATE productos SET status = 0 WHERE id =".$id;
	$result = querys($sql);
	return $result;
}