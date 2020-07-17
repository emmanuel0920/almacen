<?php
	include("../../controller/exe.php");
	function update_personal_status($id)
	{
		$sql = "UPDATE personal SET status = 0 WHERE id = $id";
		$result = querys($sql);
		return $result;
	}

	function update_personal($id, $nombre, $area)
	{
		$sql = "UPDATE personal SET nombre = '".$nombre."', area = '".$area." WHERE id = ".$id;
		$result = querys($sql);
		return $result;
	}

	function create_personal($nombre, $area)
	{
		$sql ="INSERT INTO personal(nombre, area)
						VALUES('".$nombre."', '".$area."')";
		$result = querys($sql);
		return $result;
	}

	function compare_personal($nombre)
	{
		$sql = "SELECT id FROM personal WHERE nombre = '".$nombre."'";
		$result = query_num_rows($sql);
		return $result;
	}

	function get_personal()
	{
		$sql = "SELECT id, nombre, area
					FROM personal
				WHERE status = 1";
		$result = querys($sql);
		return $result;
	}