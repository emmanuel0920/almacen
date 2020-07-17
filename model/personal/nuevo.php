<?php
include("../../controller/personal/funciones_personal.php");
	$nombre = $_POST['nombre_personal'];
	$area = $_POST['area_personal'];
	$existe = compare_personal($nombre);
	if($existe)
	{
		$mensaje = "error";
	}else{
		if(create_personal($nombre, $area))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error";
		}
	}
	echo $mensaje;
?>