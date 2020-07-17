<?php 
	$id = $_POST['id_producto'];
?>
<div id="modal_entrada_u" class="hide">
    <form id="form_entrada_u" name="form_entrada_u" method="post">
    	<input name="id_producto" id="id_producto" type="hidden" value="<?=$id?>">
	    <p>
	      Cantidad a ingresar
	      <input name="cantidad" id="cantidad" placeholder="Ingresar la cantidad a ingresar..." class="form-control" type="number" required>
	    </p>
	</form>
</div>