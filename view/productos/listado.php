<?php
	include("../../controller/funciones.php");
	include("../../model/productos/fill.php");
	user_login();
	$productos = fill_productos();
  	$tr_productos = fill_tr_productos($productos);
?>

<style type="text/css">

	@media only screen and (max-width: 520px){
		i + span{
			display: none;
		}
	}

	tooltip-inner {

	     text-align: center;
	    -webkit-border-radius: 0px;
	    -moz-border-radius: 0px;
	    border-radius: 0px;
	    margin-bottom: 6px;
	    background-color: #505050;
	    font-size: 14px;
	    width: 10px !important;
	    height: 10px !important;
	}

</style>


<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="inicio.php">Inicio</a>
		</li>
		<li>
			<a href="#">Productos</a>
		</li>
		<li class="active">Listado de Productos</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="page-header">
		<h1>
			Productos
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Listado de Productos
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
								<div style="display: inline-block; float: left;">
									<a onclick="fill_modal_entrada()" class="btn btn-success">
										<i class="ace-icon fa fa-sign-in"></i>
										<span>Entrada masiva de productos</span>
										<i class="ace-icon fa fa-cubes"></i>
									</a>
								</div>
								<span style="display: block;" class="blue bigger-170"></span>
								<span style="display: inline-block;" class="grey bigger-140">Productos</span>


								<div style="display: inline-block; float: right;">
									<a href="javascript:cambiarcont('view/productos/nuevo.php');" class="btn btn-primary">
										<i class="ace-icon fa fa-cubes"></i>
										<span>Agregar Producto</span>
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
											<th>
											    <i class="ace-icon fa fa-key bigger-110 ico_hid"></i>
												Clave
											</th>

                                            <th class="hidden"></th>

											<th class="hidden-480">
												<i class="ace-icon fa fa-pencil bigger-110 ico_hid"></i>
												Descripción del producto
											</th>

											<th>
												<i class="ace-icon fa fa-barcode bigger-110 ico_hid"></i>
												Unidad de entrada
											</th>

											<th class="hidden-480">
												<i class="ace-icon fa fa-cubes bigger-110 ico_hid"></i>
												Stock restante
											</th>

											<th class="hidden"></th>

											<th style="min-width: 94px !important;">
												<i class="ace-icon fa fa-cogs bigger-110 ico_hid"></i>
												Acciones
											</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td class="hidden"></td>
											<td class="hidden"></td>
											<td>0024</td>
											<td>Desinfectante Líquido</td>
											<td>Garrafa 20 lts.</td>
											<td>5 garrafas</td>
											<td>
												<a type="" class="btn btn-primary btn-xs" data-toggle="modal" title=""  onclick="fill_modal_entrada_u(1)"><i class="fa fa-plus-circle bigger-170"></i></a>
											</td>
										</tr>
									</tbody>
								</table>
								<div id="load_modal_entrada"></div>
								<div id="load_modal_entrada_u"></div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function show_hide_modals(){
		$('#modal_edit').on('hidden.bs.modal', function (e) {
  			$('#modal_info').modal('show');
		});
	}

	function fill_modal_entrada()
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

                document.getElementById("load_modal_entrada").innerHTML=xmlhttp.responseText;
                //show_hide_modals();
                waitingDialog.hide();
                $('#modal_entrada').modal('show');
            }
        }

        var datos_modal = "id_personal=1";

        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
        xmlhttp.open("POST","./model/productos/modal_entrada.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(datos_modal);
    }


    function fill_modal_entrada_u(id_producto)
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

                document.getElementById("load_modal_entrada_u").innerHTML=xmlhttp.responseText;
                //show_hide_modals();
                waitingDialog.hide();
                show_modal_entrada();
            }
        }

        var datos_modal = "id_producto="+id_producto;

        waitingDialog.show('Cargando Información', {dialogSize: 'sm', progressType: 'warning'})
        xmlhttp.open("POST","./model/productos/modal_entrada_uno.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(datos_modal);
    }

    function show_modal_entrada()
    {
    	var dialog = $( "#modal_entrada_u" ).removeClass('hide').dialog({
			modal: true,
			title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-cubes'></i> Desinfectante Líquido</h4></div>",
			title_html: true,
			buttons: [
				{
					text: "Cancelar",
					"class" : "btn btn-minier",
					click: function() {
						$( this ).dialog( "close" );
					}
				},
				{
					text: "Guardar",
					"class" : "btn btn-primary btn-minier",
					click: function() {
						var myform = document.getElementById("form_entrada_u");
						var datos = new FormData(myform);
				        
				        //waitingDialog.show('Dando salida a productos...', {dialogSize: 'sm', progressType: 'warning'});
				        $.ajax({
							url:   './model/productos/entrada_producto.php',
							type:  'post',
				            data:  datos,
							processData: false,
							contentType: false,

				            success:  function (data) {
				                if (data==='correcto'){
				                	$( this ).dialog( "close" );
				                    swal({
				                        title: "Entrada correcta de producto",
				                        icon: "success",
				                        button: "Aceptar"
				                    }).then(function(){
				                    	cambiarcont('view/productos/listado.php');
				                    });
				                }

				                if (data==='error'){
				                    swal({
				                        title: "¡Error!",
				                        text: "¡Ocurrió algo al dar entrada a los producto!",
				                        icon: "error",
				                        button: "Aceptar"
				                    });
				                }
				            }
				        });
						
					}
				}
			]
		});
    }


    function save_entrada_productos()
    {
    	var myform = document.getElementById("form_entrada_m");
		var datos = new FormData(myform);
        
        //waitingDialog.show('Dando salida a productos...', {dialogSize: 'sm', progressType: 'warning'});
        $.ajax({
			url:   './model/productos/entrada_producto.php',
			type:  'post',
            data:  datos,
			processData: false,
			contentType: false,

            success:  function (data) {
                if (data==='correcto'){
                	$('#modal_entrada').modal('hide');
                    swal({
                        title: "Entrada correcta de productos",
                        icon: "success",
                        button: "Aceptar"
                    }).then(function(){
                    	cambiarcont('view/productos/listado.php');
                    });
                }

                if (data==='error'){
                    swal({
                        title: "¡Error!",
                        text: "¡Ocurrió algo al dar entrada a los productos!",
                        icon: "error",
                        button: "Aceptar"
                    });
                }

            }
        });
    }

    //override dialog's title function to allow for HTML titles
	$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
		_title: function(title) {
			var $title = this.options.title || '&nbsp;'
			if( ("title_html" in this.options) && this.options.title_html == true )
				title.html($title);
			else title.text($title);
		}
	}));
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
</script>


<script type="text/javascript">
	$('.show-details-btn').on('click', function(e) {
		e.preventDefault();
		$(this).closest('tr').next().toggleClass('open');
		$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-up').toggleClass('fa-angle-double-up');
	});


	$( document ).ready(function() {
		var screen = $( window ).width();
		if (screen < 916) {
			$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-6').addClass('col-xs-12');
		}

		else{
			$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-12').addClass('col-xs-6');
		}

	});


	$( window ).resize(function() {
		var screen = $( window ).width();
		if (screen < 916) {
			$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-6').addClass('col-xs-12');
		 }

		else{
			$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-12').addClass('col-xs-6');
		}

	});
</script>