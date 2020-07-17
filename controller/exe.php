<?php

function querys($sql)
{
	include('conexion.php');

	$result = mysqli_query($conexion, $sql);

	return $result;
}

function query_num_rows($sql)
{
	include('conexion.php');	

	$result = mysqli_query($conexion, $sql);

	$result = mysqli_num_rows($result);

	return $result;
}

function query_last_id($sql)
{
	include('conexion.php');

	$result = mysqli_query($conexion, $sql);

	$result = mysqli_insert_id($conexion);

	return $result;
}

function query_row_id($sql)
{
	include('conexion.php');

	$result = mysqli_query($conexion, $sql);

	$result = mysqli_fetch_array($result, MYSQLI_ASSOC);

	return $result;
}