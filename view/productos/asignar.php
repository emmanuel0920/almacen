<?php
	include("../../model/productos/fill.php");
	$personal = fill_personal();
	$productos = fill_productos();
	$tr_personal = fill_tr_personal($personal);
	$tr_productos = fill_tr_productos($productos);
?>
<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<!-- <li>
			<a href="#">Productos</a>
		</li> -->
		<li class="active">Asignación de Insumos</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1>
			Asignación de Insumos
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado del Personal
			</small>
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<div class="container" style="width: 100%;">
				<div class="message-container">
					<div id="id-message-list-navbar" class="message-navbar clearfix">
						<div class="">
							<div class="message-infobar clearfix" id="id-message-infobar">
								<span style="display: block;" class="blue bigger-170"></span>
								<span style="display: inline-block;" class="grey bigger-140">Personal</span>
								<div style="display: inline-block; float: right;">
									<a class="btn btn-info" data-toggle="modal" data-target="#modal_nuevo_personal">
										<i class="ace-icon fa fa-users"></i>
										<span>Agregar Personal</span>
									</a>
								</div>

								<hr style="border-width: 1px; border-color: #b3bbc9;">

								<div class="clearfix">
									<div class="pull-right tableTools-container"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="message-list-container">
						<div class="message-list" id="message-list">
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="hidden"></th>
                                            <th class="hidden"></th>
                                            <th class="hidden"></th>
											<th class="hidden"></th>

											<th class="hidden-480">
												<i class="ace-icon fa fa-user bigger-110 ico_hid"></i>
												Nombre
											</th>

											<th class="hidden">
												<i class="ace-icon fa fa-briefcase bigger-110 ico_hid"></i>
												Area de trabajo
											</th>

											<th style="min-width: 94px !important;">
												<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
												Acciones
											</th>
										</tr>
									</thead>

									<tbody>
									<?=$tr_personal;?>
									</tbody>
								</table>
								<div id="load_modal_salida"></div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modal_nuevo_personal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Datos de la Persona</h4>
      </div>
      <div class="modal-body">
      	  <form class="well form-horizontal" method="post" id="form_nuevo_personal" name="form_nuevo_personal">
            <fieldset>

                <div class="form-group">
                    <label class="col-md-4 control-label">Nombre completo:<font color="red">&nbsp;*</font></label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                            <input name="nombre_personal" id="nombre_personal" placeholder="Ingresar el nombre..." class="form-control" type="text" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Área de trabajo:
                        <!-- <font color="red">*</font> -->
                    </label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
                            <input name="area_personal" id="area_personal" placeholder="Ingresar el área..." class="form-control" type="text">
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="form_nuevo_personal" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>

<script type="text/javascript">
	function borrar_personal(){
		swal({
            title: "¿Eliminar a la persona?",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true
        }).then((willDelete)=> {
        	var datos = {id_personal : $("#id_personal").val(),}
        	$.ajax({
                data:  datos,
                url:   './model/personal/erase.php',
                type:  'post',
             });
        		if(willDelete){
        			swal({
        				title: "¡Persona eliminada!",
        				icon:"error"
        			}).then(function(){
                        window.location = "inicio.php";
                    });
        		}else{
        			swal({
        				title: "Persona a salvo",
        				icon: "success"
        			});
        		}
        });
	}
</script>

<script type="text/javascript">

    $('#form_nuevo_personal').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
            nombre_personal: {
                required: true,
                minlength: 3
            },

            area_personal: {
                required: true,
                minlength: 3
            }
        },

        messages: {
            nombre_personal: {
                required: "Ingresar el nombre del personal.",
                minlength: "Ingresar un nombre más largo."
            },

            area_personal: {
                required: "Ingresar el área del personal.",
                minlength: "Ingresar un nombre más largo."
            }
        },


        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
            $(e).remove();
        },

        errorPlacement: function (error, element) {
            if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                var controls = element.closest('div[class*="col-"]');
                if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if(element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if(element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            }
            else error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
            var datos = {
                "nombre_personal" : $("#nombre_personal").val(),
                "area_personal" : $("#area_personal").val()
            };

            //btn_guardar.disabled=true;
            //waitingDialog.show('Guardando...', {dialogSize: 'sm', progressType: 'warning'});
            $.ajax({
                data:  datos,
                url:   './model/personal/nuevo.php',
                type:  'post',

                success:  function (data) {

                    if (data==='correcto'){
                    	$('#modal_nuevo_personal').modal('hide');
                        swal({
                            title: "Guardado correctamente!",
                            icon: "success",
                            button: "Aceptar"
                        }).then(function(){
                        	window.location = "inicio.php";
                        });
                    }

                    if (data==='error'){
                        swal({
                            title: "¡Error!",
                            text: "¡Ocurrió algo al guardar!",
                            icon: "error",
                            button: "Aceptar"
                        });
                    }

                }
            });
        }

    });
</script>

<script type="text/javascript">
	jQuery(function($) {

		//initiate dataTables plugin
		var myTable =
		$('#dynamic-table')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
			  { "bSortable": false },
			  null, null,null, null, null,
			  { "bSortable": false }
			],
			"aaSorting": [],


			//"bProcessing": true,
	        //"bServerSide": true,
	        //"sAjaxSource": "http://127.0.0.1/table.php"	,

			//,
			//"sScrollY": "200px",
			//"bPaginate": false,

			//"sScrollX": "100%",
			//"sScrollXInner": "120%",
			//"bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element

			//"iDisplayLength": 50


			select: {
				style: 'multi'
			}
	    } );



		$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

		new $.fn.dataTable.Buttons( myTable, {
			buttons: [
			  {
				"extend": "colvis",
				"text": "<i class='fa fa-search bigger-110 blue'></i> <span style='font-size:9px'>Mostrar/ocultar columnas</span>",
				"className": "btn btn-white btn-primary btn-bold",
				columns: ':not(:first):not(:last)'
			  },
			  {
				"extend": "copy",
				"text": "<i class='fa fa-copy bigger-110 pink'></i> <span>Copiar</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "csv",
				"text": "<i class='fa fa-table bigger-110 orange'></i> <span>Exportar</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "excel",
				"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "pdf",
				"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
				"className": "btn btn-white btn-primary btn-bold"
			  },
			  {
				"extend": "print",
				"text": "<i class='fa fa-print bigger-110 grey'></i> <span>Imprimir</span>",
				"className": "btn btn-white btn-primary btn-bold",
				autoPrint: false,
				message: 'This print was produced using the Print button for DataTables'
			  }
			]
		} );
		myTable.buttons().container().appendTo( $('.tableTools-container') );

		//style the message box
		var defaultCopyAction = myTable.button(1).action();
		myTable.button(1).action(function (e, dt, button, config) {
			defaultCopyAction(e, dt, button, config);
			$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
		});


		var defaultColvisAction = myTable.button(0).action();
		myTable.button(0).action(function (e, dt, button, config) {

			defaultColvisAction(e, dt, button, config);


			if($('.dt-button-collection > .dropdown-menu').length == 0) {
				$('.dt-button-collection')
				.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
				.find('a').attr('href', '#').wrap("<li />")
			}
			$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
		});

		////

		setTimeout(function() {
			$($('.tableTools-container')).find('a.dt-button').each(function() {
				var div = $(this).find(' > div').first();
				if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
				else $(this).tooltip({container: 'body', title: $(this).text()});
			});
		}, 500);





		myTable.on( 'select', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
			}
		} );
		myTable.on( 'deselect', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
			}
		} );




		/////////////////////////////////
		//table checkboxes
		$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

		//select/deselect all rows according to table header checkbox
		$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header

			$('#dynamic-table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) myTable.row(row).select();
				else  myTable.row(row).deselect();
			});
		});

		//select/deselect a row when the checkbox is checked/unchecked
		$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
			var row = $(this).closest('tr').get(0);
			if(this.checked) myTable.row(row).deselect();
			else myTable.row(row).select();
		});



		$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
			e.stopImmediatePropagation();
			e.stopPropagation();
			e.preventDefault();
		});

		/********************************/
		//add tooltip for small view action buttons in dropdown menu
		$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

		//tooltip placement on right or left
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();

			var off2 = $source.offset();
			//var w2 = $source.width();

			if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			return 'left';
		}

	})


	function fill_modal_salida(id_personal,nombre)
    {
        var xmlhttp;

        if (window.XMLHttpRequest){
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }

        else{// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function(){

            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
                document.getElementById("load_modal_salida").innerHTML=xmlhttp.responseText;
                //show_hide_modals();
                waitingDialog.hide();
                $('#modal_salida').modal('show');
            }
        }

        var datos_modal = "id_personal="+id_personal+"&nombre="+nombre;

        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
        xmlhttp.open("POST","./model/productos/modal_salida.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(datos_modal);
    }

    function fill_modal_agregar_personal(id_personal)
    {
    	var xmlhttp;

        if (window.XMLHttpRequest){
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }

        else{// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function(){

            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                //document.getElementById("loading").innerHTML = ''; // Hide the image after the response from the
                document.getElementById("load_modal_salida").innerHTML=xmlhttp.responseText;
                //show_hide_modals();
                waitingDialog.hide();
                $('#modal_salida').modal('show');
            }
        }

        var datos_modal = "id_personal="+id_personal;

        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
        xmlhttp.open("POST","./model/productos/modal_salida.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(datos_modal);
    }

    function save_salida_productos()
    {
    	var myform = document.getElementById("form_salida");
		var datos = new FormData(myform);
        
        //waitingDialog.show('Dando salida a productos...', {dialogSize: 'sm', progressType: 'warning'});
        $.ajax({
			url:   './model/productos/salida_producto.php',
			type:  'post',
            data:  datos,
			processData: false,
			contentType: false,

            success:  function (data) {
                if (data==='correcto'){
                	$('#modal_salida').modal('hide');
                    swal({
                        title: "Salida correcta de productos",
                        icon: "success",
                        button: "Aceptar"
                    }).then(function(){
                    	window.location = "inicio.php";
                    });
                }

                if (data==='error'){
                    swal({
                        title: "¡Error!",
                        text: "¡Ocurrió algo al dar salida a los productos!",
                        icon: "error",
                        button: "Aceptar"
                    });
                }

            }
        });
    }
</script>