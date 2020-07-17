  $(document).ready(function() {
    $('#form1').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                        stringLength: {
                        min: 10,
                    },
                        notEmpty: {
                        message: 'Favor de Introducir su nombre completo'
                    }
                }
            },
             asunto: {
                validators: {
                     stringLength: {
                        min: 10,
                    },
                    notEmpty: {
                        message: 'Ingrese el asunto a tratar'
                    }
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                        message: 'Favor de ingresar un numero de teléfono'
                    },                    
                }
            },
            secretaria: {
                validators: {
                    notEmpty: {
                        message: 'Favor de seleccionar una secretaría'
                    },                    
                }
            },
            area: {
                validators: {
                    notEmpty: {
                        message: 'Favor de ingresar seleccionar un área'
                    },                    
                }
            },
            direccion: {
                validators: {
                     stringLength: {
                        min: 10,
                    },
                    notEmpty: {
                        message: 'Favor de ingresar la dirección completa'
                    }
                }
            },
            localidad: {
                validators: {
                     stringLength: {
                        min: 5,
                    },
                    notEmpty: {
                        message: 'Favor de ingresar la localidad'
                    }
                }
            },
            genero: {
                validators: {
                    notEmpty: {
                        message: 'Favor de seleccionar una opción'
                    }
                }
            },
            comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});


    $(document).ready(function() {
    $('#form_observaciones').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        fields: {
            fecha: {
                observacion: {
                        stringLength: {
                        min: 10,
                    },
                        notEmpty: {
                        message: 'Ingresar Observacion'
                    }
                }
            },
             status: {
                validators: {
                    notEmpty: {
                        message: 'Favor de seleccionar una opción'
                    }
                }
            },

            
            }
        })
});




    $(document).ready(function() {
    $('#form2').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fecha: {
                validators: {
                        stringLength: {
                        min: 10,
                    },
                        notEmpty: {
                        message: 'Ingresar Fecha'
                    }
                }
            },
             peticion: {
                validators: {
                     stringLength: {
                        min: 10,
                    },
                    notEmpty: {
                        message: 'Ingrese la peticion'
                    }
                }
            },
            respuesta: {
                validators: {
                     stringLength: {
                        min: 10,
                    },
                    notEmpty: {
                        message: 'Ingrese la respuesta'
                    }
                }
            },
            
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});