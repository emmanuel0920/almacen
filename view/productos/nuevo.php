<?php
    include('../../controller/funciones.php');
?>


<div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="inicio.php">Inicio</a>
        </li>
        <li>
            <a href="#">Productos</a>
        </li>
        <li class="active">Registro de Productos</li>
    </ul><!-- /.breadcrumb -->  
</div>


<div class="page-content">
    <div class="page-header">        
        <h1>
            Productos
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Registro de Productos
            </small>
        </h1>
    </div><!-- /.page-header -->    

    <div class="row">
        <div class="col-xs-12">
            <div class="container-fluid">


                <form class="well form-horizontal" method="post"  id="form_producto" name="form_producto">
                    <fieldset>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombre del producto:<font color="red">&nbsp;*</font></label>  
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input name="nombre_producto" id="nombre_producto" placeholder="Ingresar el nombre del producto..." class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Descripción: 
                                <!-- <font color="red">*</font> -->
                            </label>  
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
                                    <input name="descripcion_producto" id="descripcion_producto" placeholder="Ingresar la descripción del produccto..." class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Unidad de salida: <font color="red">*</font></label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-sort-amount-desc"></i></span>
                                    <input  name="unidad_producto" id="unidad_producto" placeholder="Ingresar la unidad del producto (p. ej. litro, unidad, etc.)..." class="form-control" type="text" required/>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex;">
                            <div style="margin: auto;">
                                <button type="submit" class="btn btn-success btn-md"><i class="fa fa-floppy-o"></i>&nbsp;Guardar</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>    
            
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#form_producto').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
            nombre_producto: {
                required: true,
                minlength: 3
            },

            unidad_producto: {
                required: true,
                minlength: 3
            }
        },     

        messages: {
            nombre_producto: {
                required: "Ingresar el nombre del producto.",
                minlength: "Ingresar un nombre más largo."
            },

            unidad_producto: {
                required: "Ingresar la unidad del producto.",
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
                "nombre_producto" : $("#nombre_producto").val(),
                "descripcion_producto" : $("#descripcion_producto").val(),
                "unidad_producto" : $("#unidad_producto").val()
            };

            //btn_guardar.disabled=true;
            //waitingDialog.show('Guardando...', {dialogSize: 'sm', progressType: 'warning'});
            $.ajax({
                data:  datos,
                url:   './model/productos/nuevo_producto.php',
                type:  'post',
                
                success:  function (data) {
                                                        
                    if (data==='correcto'){
                        swal({
                            title: "Producto guardado correctamente!",
                            icon: "success",
                            button: "Aceptar"
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