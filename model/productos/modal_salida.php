<?php
  include("../../model/productos/fill.php");
  
  $nombre = $_POST['nombre'];
  $id = $_POST['id_personal'];
  $productos = fill_productos();
  $tr_productos = fill_tr_productos($productos);
?>
<div class="modal fade" id="modal_salida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel"><?=$nombre?></h4>
      		</div>
      		<div class="modal-body">
            <form method="post"  id="form_salida" name="form_salida">
          		<table class="table table-striped">
          			<thead>
          				<tr>

          					<th>Producto</th>
          					<th>Cantidad</th>
          				</tr>
          			</thead>                
            			<tbody>               
                      <input type="hidden" name="id_personal" id="id_personal" value="<?=$id?>">
            				  <?=$tr_productos?>                
            			</tbody>               
          		</table>
            </form>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
        		<button class="btn btn-success" type="button" onclick="save_salida_productos()"><i class="fa fa-floppy-o"></i>&nbsp;Guardar</button>
      		</div>
    	</div>
  	</div>
</div>