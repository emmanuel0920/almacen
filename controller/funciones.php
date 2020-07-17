<?php
include('conexion.php'); 
/*eliminamos codigo malicioso de las variables.*/
function limpiar($var)
{
    $var = trim($var);
    $var = htmlspecialchars($var);
    $var = str_replace(chr(160),'',$var);
    return $var;
}
 
/*con esta opcion verificamos que el usuario este registrado y logeado correctamente*/
function user_login()
{
    if(!$_SESSION['id_usuario'])
    {
        exit ("<script>window.location.href='index.php';</script>");
    }
}
function registro_log_error($mensaje)
{
	$file_name="../logs/".date("Y-m-d")." Error-Login.TXT";
    if(!file_exists($file_name));
    $file_load= fopen($file_name, "a");
    fwrite($file_load, $mensaje);
}
?>