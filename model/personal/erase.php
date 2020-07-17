<?php
	include("../../controller/personal/funciones_personal.php");
	$id_personal = $_POST['id_personal'];
	if($id_personal)
	{
		if(update_personal_status($id_personal))
		{
			$mensaje = "correcto";
		}else{
			$mensaje = "error";
		}
	}
	echo $mensaje
?>