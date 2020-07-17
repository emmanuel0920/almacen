<?php
include("../../controller/productos/funciones_productos.php");
function fill_personal()
{
	$nombres = get_personal();

	return $nombres;
}

function fill_productos()
{
	$productos = get_productos();

	return $productos;
}

function fill_tr_personal($personal)
{
	$tr_personal = "";
	foreach ($personal as $persona)
	{
		$nombre_personal="'".$persona['nombre']."'";
		$tr_personal.='<tr>
							<td class="hidden"><input type="number" name="id_personal" id="id_personal" value="'.$persona['id'].'"></td>
							<td class="hidden"></td>
							<td class="hidden"></td>
							<td class="hidden"></td>

							<td>'.$persona['nombre'].'</td>
							<td class="hidden">'.$persona['area'].'</td>
							<td>
								<a type="" class="btn btn-primary btn-xs" data-toggle="modal" title=""  onclick="fill_modal_salida('.$persona['id'].','.$nombre_personal.')"><i class="fa fa-plus-circle bigger-170"></i></a>
								<a class="btn btn-danger btn-xs" onclick="borrar_personal('.$persona['id'].');"><i class="fa fa-trash bigger-170"></i></a>
							</td>
						</tr>';
	}
	return $tr_personal;
}

function fill_tr_productos($productos)
{
	$tr_productos= "";

	foreach ($productos as $producto)
	{
		$tr_productos.='<tr>

        					<td>'.$producto['nombre'].'</td>
        					<td>
        						<input type="number" name="'.$producto['nombre'].'" id="'.$producto['nombre'].'"> '.$producto['unidad'].'.
        					</td>
        				</tr>
						';
	}
	return $tr_productos;
}