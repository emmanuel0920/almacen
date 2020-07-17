<div class="modal fade" id="modal_entrada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Entrada de productos</h4>
      		</div>
      		<div class="modal-body">
            <form id="form_entrada_m" name="form_entrada_m" method="post">
          		<table class="table table-striped">
          			<thead>
          				<tr>

          					<th>Producto</th>
          					<th>Cantidad</th>
          				</tr>
          			</thead>
          			<tbody>          				
	        				<tr>
	        					<td>Cloro</td>
	        					<td>
	        						<input type="number" name="cloro" id="cloro"> lts.
	        					</td>
	        				</tr>  	        			
          			</tbody>
          		</table>
            </form>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cerrar</button>
        		<button type="button" class="btn btn-success" onclick="save_entrada_productos()"><i class="fa fa-floppy-o"></i>&nbsp;Guardar</button>
      		</div>
    	</div>
  	</div>
</div>