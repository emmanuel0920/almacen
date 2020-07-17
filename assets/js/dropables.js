

/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------DROPABLES----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

        $("#panteon_body").droppable({

            accept:"#drag1",
            drop: function(event,ui){
                $(this).append($(ui.draggable).clone());                  
                con_pat++;

                var id_patio= 'patio'+con_pat;
                var body_pat= 'patio'+con_pat+'_body';
                var era_pat= id_patio +"_erase";
                var sum_pat = con_pat;
                header_pat= 'patio'+con_pat+'_header';

                $("#drag1").attr("id",id_patio);
                $("#display1").attr("id",header_pat);
                $("#drag1_body").attr("id",body_pat);
                $("#erase_pat").attr("id",era_pat);

                $("#"+id_patio).removeClass("ui-draggable ui-draggable-handle");
                $("#"+id_patio).addClass("col-xs-12");
                $("#"+id_patio).find(".widget-title").text(id_patio);
                $("#"+header_pat).css("display","block");

                var elemento="#"+id_patio;

                var parametros= {
                    "id_elemento" : id_patio,
                    "tipo": "Patio",
                    "numero" : con_pat
                };

                create(parametros);
                //$('#modal_llenado').modal('show');   

                
                var cambio_patio="";

                // select the target node
                var target_patio = document.querySelector('#'+body_pat);
                 
                // create an observer instance
                var observer_patio = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        //console.log(mutation.addedNodes.length + ' nodes added');
                        //console.log(mutation.removedNodes.length+ ' nodes removed');
                        for (var i = 0; i < mutation.addedNodes.length; i++) {
                            cambio_patio++;
                            console.log(cambio_patio);
                    
                        }
                        for (var i = 0; i < mutation.removedNodes.length; i++) {
                            cambio_patio--;
                            console.log(cambio_patio);
                        }
                        
                    });
                });

                var config_patio = { attributes: true, childList: true, characterData: true }
                
                observer_patio.observe(target_patio, config_patio);
                 
                $("#"+era_pat).on("click", function(){       
                  
                    if(cambio_patio>0){
                        swal("¡Error!", "Hay manzanas agregadas a este patio.", "error");

                    } else{
                        var parametros_update= {
                            "id_elemento" : id_patio,
                            "tipo": "Patio",
                            "numero" : con_pat
                        };
                        really(elemento, parametros_update);
                    }
                    
                });

                
                var con_man = 0;
                var header_man;

                $("#"+body_pat).droppable({
                    accept:"#drag2",
                    drop: function(event,ui){
                        $(this).append($(ui.draggable).clone());
                        
                        con_man++;
                        
                        var id_manzana = id_patio+'_manzana'+con_man;
                        var body_man = id_patio+'_manzana'+con_man+'_body';
                        var era_man = id_manzana +"_erase";
                        var sum_man = con_man;
                        header_man = id_patio+'_manzana'+con_man+'_header';


                        $("#drag2").attr("id",id_manzana);
                        $("#display2").attr("id",header_man);
                        $("#drag2_body").attr("id",body_man);
                        $("#erase_man").attr("id",era_man);


                        $("#"+id_manzana).removeClass("ui-draggable ui-draggable-handle");
                        $("#"+id_manzana).addClass("col-xs-12");
                        $("#"+id_manzana).find(".widget-title").text(id_manzana);
                        $("#"+header_man).css("display","block");

                        var elemento="#"+id_manzana;

                        var parametros= {
                            "id_elemento" : id_manzana,
                            "tipo": "Manzana",
                            "numero" : con_man
                        };

                        create(parametros);


                        var cambio_manzana="";

                        // select the target node
                        var target_manzana= document.querySelector('#'+body_man);
                         
                        // create an observer instance
                        var observer_manzana = new MutationObserver(function(mutations_manzana) {
                            mutations_manzana.forEach(function(mutation_manzana) {
                                //console.log(mutation_manzana.addedNodes.length + ' nodes added');
                                //console.log(mutation_manzana.removedNodes.length+ ' nodes removed');
                                for (var i = 0; i < mutation_manzana.addedNodes.length; i++) {
                                    cambio_manzana++;
                                    console.log(cambio_manzana);
                            
                                }
                                for (var i = 0; i < mutation_manzana.removedNodes.length; i++) {
                                    cambio_manzana--;
                                    console.log(cambio_manzana);
                                }
                                
                            });
                        });

                        // configuration of the observer:
                        var config_manzana = { attributes: true, childList: true, characterData: true }
                         
                        // pass in the target node, as well as the observer options
                        observer_manzana.observe(target_manzana, config_manzana);

                        $("#"+era_man).click(function() {                   
                            
                            if(cambio_manzana>0){
                                swal("Error", "Hay secciones y/o módulos agregados a esta manzana.", "error");

                            } else{
                                var parametros_update= {
                                    "id_elemento" : id_manzana,
                                    "tipo": "Manzana",
                                    "numero" : con_man
                                };
                                really(elemento, parametros_update);
                            }
                        });




                        var con_sec = 0;
                        var con_mod = 0;

                        var header_sec;
                        var header_mod;  

                        $("#"+body_man).droppable({
                            accept:"#drag3 , #drag4",
                            drop: function(event,ui){
                                $(this).append($(ui.draggable).clone());

                                
                                var selector_1 = $(ui.draggable).is("#drag3");

                                if ( selector_1 == true ) {
                                    
                                    con_sec++;
                                    
                                    var id_seccion = id_manzana+'_'+'seccion'+con_sec;
                                    var body_sec = id_manzana+'_seccion'+con_sec+'_body';
                                    var era_sec = id_seccion + "_erase";
                                    var sum_sec = con_sec;
                                    header_sec = id_manzana+'_seccion'+con_sec+'_header';

                                    $("#drag3").attr("id",id_seccion);
                                    $("#display3").attr("id",header_sec);
                                    $("#drag3_body").attr("id",body_sec);
                                    $("#erase_sec").attr("id",era_sec);

                                    $("#"+id_seccion).removeClass("ui-draggable ui-draggable-handle");
                                    $("#"+id_seccion).addClass("col-xs-12");
                                    $("#"+id_seccion).find(".widget-title").text(id_seccion);
                                    $("#"+header_sec).css("display","block");

                                    var elemento="#"+id_seccion;

                                    var parametros= {
                                        "id_elemento" : id_seccion,
                                        "tipo": "Sección",
                                        "numero" : con_sec
                                    };

                                    create(parametros);


                                    var cambio_seccion="";

                                    // select the target node
                                    var target_seccion= document.querySelector('#'+body_sec);
                                     
                                    // create an observer instance
                                    var observer_seccion = new MutationObserver(function(mutations_seccion) {
                                        mutations_seccion.forEach(function(mutation_seccion) {
                                            //console.log(mutation_seccion.addedNodes.length + ' nodes added');
                                            //console.log(mutation_seccion.removedNodes.length+ ' nodes removed');
                                            for (var i = 0; i < mutation_seccion.addedNodes.length; i++) {
                                                cambio_seccion++;
                                                console.log(cambio_seccion);
                                        
                                            }
                                            for (var i = 0; i < mutation_seccion.removedNodes.length; i++) {
                                                cambio_seccion--;
                                                console.log(cambio_seccion);
                                            }
                                            
                                        });
                                    });

                                    // configuration of the observer:
                                    var config_seccion = { attributes: true, childList: true, characterData: true }
                                     
                                    // pass in the target node, as well as the observer options
                                    observer_seccion.observe(target_seccion, config_seccion);


                                    $("#"+era_sec).click(function() {     
                                        if(cambio_seccion>0){
                                            swal("Error", "Hay lotes y/o angelitos agregados a esta sección.", "error");

                                        } else{
                                            var parametros_update= {
                                                "id_elemento" : id_seccion,
                                                "tipo": "Sección",
                                                "numero" : con_sec
                                            };
                                            really(elemento, parametros_update);
                                        }
                                    });
                                    
                                    

                                    var con_lot = 0;
                                    var con_angel_1 = 0;

                                    var header_lot;
                                    var header_angel_1;

                                    $("#"+body_sec).droppable({
                                        accept:"#drag5 , #drag7",
                                        drop: function(event,ui){
                                            $(this).append($(ui.draggable).clone());

                                            var selector_a = $(ui.draggable).is("#drag5");

                                            if (selector_a == true){

                                                con_lot++;
                                                
                                                var id_lote = id_seccion+'_'+'lote'+con_lot;
                                                var body_lot = id_seccion+'_lote'+con_lot+'_body';
                                                var era_lot = id_lote +"_erase";
                                                var sum_lot = con_lot;
                                                header_lot = id_seccion+'_lote'+con_lot+'_header';
                                                
                                                $("#drag5").attr("id",id_lote);
                                                $("#display5").attr("id",header_lot);
                                                $("#drag5_body").attr("id",body_lot);
                                                $("#erase_lot").attr("id",era_lot);

                                                $("#"+id_lote).removeClass("ui-draggable ui-draggable-handle");
                                                $("#"+id_lote).addClass("col-xs-12");
                                                $("#"+id_lote).find(".widget-title").text(id_lote);
                                                $("#"+header_lot).css("display","block");

                                                var elemento="#"+id_lote;

                                                var parametros= {
                                                    "id_elemento" : id_lote,
                                                    "tipo": "Lote",
                                                    "numero" : con_lot
                                                };

                                                create(parametros);

                                                $("#"+era_lot).click(function() {

                                                    var parametros_update= {
                                                        "id_elemento" : id_lote,
                                                        "tipo": "Lote",
                                                        "numero" : sum_lot
                                                    };

                                                    really(elemento, parametros_update);
                                                });

                                            }

                                            else{

                                                con_angel_1++;

                                                var id_angel_seccion = id_seccion+'_'+'angelito'+con_angel_1;
                                                var body_angel_1 = id_seccion+'_angelito'+con_angel_1+'_body';
                                                var era_ang_sec = id_angel_seccion +"_erase";
                                                var sum_ang_1 = con_angel_1; 
                                                header_angel_1 = id_seccion+'_angelito'+con_angel_1+'_header';
                                                
                                                $("#drag7").attr("id",id_angel_seccion);
                                                $("#display7").attr("id",header_angel_1);
                                                $("#drag7_body").attr("id",body_angel_1);
                                                $("#erase_ang").attr("id",era_ang_sec);

                                                $("#"+id_angel_seccion).removeClass("ui-draggable ui-draggable-handle");
                                                $("#"+id_angel_seccion).addClass("col-xs-12");
                                                $("#"+id_angel_seccion).find(".widget-title").text(id_angel_seccion);
                                                $("#"+header_angel_1).css("display","block");

                                                var elemento="#"+id_angel_seccion;

                                                var parametros= {
                                                    "id_elemento" : id_angel_seccion,
                                                    "tipo": "Angelito",
                                                    "numero" : con_angel_1
                                                };

                                                create(parametros);

                                                $("#"+era_ang_sec).click(function() {            

                                                    var parametros_update= {
                                                        "id_elemento" : id_angel_seccion,
                                                        "tipo": "Angelito",
                                                        "numero" : sum_ang_1
                                                    };

                                                    really(elemento, parametros_update);
                                                });
                                            }
                                        }
                                    });    
                                }

                                else {

                                    con_mod++;

                                    var id_modulo = id_manzana+'_modulo'+con_mod;
                                    var body_mod = id_manzana+'_modulo'+con_mod+'_body';
                                    var era_mod = id_modulo + "_erase";
                                    var sum_mod = con_mod;
                                    header_mod = id_manzana+'_modulo'+con_mod+'_header';
                                    
                                    $("#drag4").attr("id",id_modulo);
                                    $("#display4").attr("id",header_mod);
                                    $("#drag4_body").attr("id",body_mod);
                                    $("#erase_mod").attr("id",era_mod);

                                    $("#"+id_modulo).removeClass("ui-draggable ui-draggable-handle");
                                    $("#"+id_modulo).addClass("col-xs-12");
                                    $("#"+id_modulo).find(".widget-title").text(id_modulo);
                                    $("#"+header_mod).css("display","block");

                                    var elemento="#"+id_modulo;

                                    var parametros= {
                                        "id_elemento" : id_modulo,
                                        "tipo": "Módulo",
                                        "numero" : con_mod
                                    };

                                    create(parametros);

                                    var cambio_modulo="";

                                    // select the target node
                                    var target_modulo= document.querySelector('#'+body_mod);
                                     
                                    // create an observer instance
                                    var observer_modulo = new MutationObserver(function(mutations_modulo) {
                                        mutations_modulo.forEach(function(mutation_modulo) {
                                            //console.log(mutation_modulo.addedNodes.length + ' nodes added');
                                            //console.log(mutation_modulo.removedNodes.length+ ' nodes removed');
                                            for (var i = 0; i < mutation_modulo.addedNodes.length; i++) {
                                                cambio_modulo++;
                                                console.log(cambio_modulo);
                                        
                                            }
                                            for (var i = 0; i < mutation_modulo.removedNodes.length; i++) {
                                                cambio_modulo--;
                                                console.log(cambio_modulo);
                                            }
                                            
                                        });
                                    });

                                    // configuration of the observer:
                                    var config_modulo = { attributes: true, childList: true, characterData: true }
                                     
                                    // pass in the target node, as well as the observer options
                                    observer_modulo.observe(target_modulo, config_modulo);


                                    $("#"+era_mod).click(function() {     
                                        if(cambio_modulo>0){
                                            swal("Error", "Hay gabetas y/o angelitos agregados a este módulo.", "error");

                                        } else{
                                            var parametros_update= {
                                                "id_elemento" : id_modulo,
                                                "tipo": "Módulo",
                                                "numero" : con_mod
                                            };
                                            really(elemento, parametros_update);
                                        }
                                    });

                                    var con_gab = 0;
                                    var con_angel_2 = 0;

                                    var header_gab;
                                    var header_angel_2;

                                    $("#"+body_mod).droppable({
                                        accept:"#drag6 , #drag7",
                                        drop: function(event,ui){
                                            $(this).append($(ui.draggable).clone());

                                            var selector_b = $(ui.draggable).is("#drag6");

                                            if (selector_b==true) {

                                                con_gab++;
                                                
                                                var id_gabeta = id_modulo+'_gabeta'+con_gab;
                                                var body_gab = id_modulo+'_'+'gabeta'+con_gab+'_body';
                                                var era_gab = id_gabeta + "_erase";
                                                var sum_gab = con_gab;
                                                header_gab = id_modulo+'_gabeta'+con_gab+'_header';

                                                $("#drag6").attr("id",id_gabeta);
                                                $("#display6").attr("id",header_gab);
                                                $("#drag6_body").attr("id",body_gab);
                                                $("#erase_gab").attr("id",era_gab);
                                                
                                                $("#"+id_gabeta).removeClass("ui-draggable ui-draggable-handle");
                                                $("#"+id_gabeta).addClass("col-xs-12");
                                                $("#"+id_gabeta).find(".widget-title").text(id_gabeta);
                                                $("#"+header_gab).css("display","block");

                                                var elemento="#"+id_gabeta;

                                                var parametros= {
                                                    "id_elemento" : id_gabeta,
                                                    "tipo": "Gabeta",
                                                    "numero" : con_gab
                                                };

                                                create(parametros);

                                                $("#"+era_gab).click(function() {   

                                                    var parametros_update= {
                                                        "id_elemento" : id_gabeta,
                                                        "tipo": "Gabeta",
                                                        "numero" : sum_gab
                                                    };                                                    

                                                    really(elemento, parametros_update);
                                                });
                                            }

                                            else{

                                                con_angel_2++;
                                                
                                                var id_angel_modulo = id_modulo+'_angelito'+con_angel_2;
                                                var body_angel_2 = id_modulo+'_angelito'+con_angel_2+'_body';
                                                var era_ang_mod = id_angel_modulo + "_erase";
                                                var sum_ang_2 = con_angel_2;
                                                header_angel_2 = id_modulo+'_angelito'+con_angel_2+'_header';
                                                
                                                $("#drag7").attr("id",id_angel_modulo);
                                                $("#display7").attr("id",header_angel_2);
                                                $("#drag7_body").attr("id",body_angel_2);
                                                $("#erase_ang").attr("id",era_ang_mod);

                                                $("#"+id_angel_modulo).removeClass("ui-draggable ui-draggable-handle");
                                                $("#"+id_angel_modulo).addClass("col-xs-12");
                                                $("#"+id_angel_modulo).find(".widget-title").text(id_angel_modulo);
                                                $("#"+header_angel_2).css("display","block");

                                                var elemento="#"+id_angel_modulo;

                                                var parametros= {
                                                    "id_elemento" : id_angel_modulo,
                                                    "tipo": "Angelito",
                                                    "numero" : con_angel_2
                                                };

                                                create(parametros);

                                                $("#"+era_ang_mod).click(function() {

                                                    var parametros_update= {
                                                        "id_elemento" : id_angel_modulo,
                                                        "tipo": "Angelito",
                                                        "numero" : sum_ang_2
                                                    };

                                                    really(elemento, parametros_update);
                                                });
                                            }
                                        }
                                    });
                                }
                            }     
                        });
                    }
                });
            }    
        });
    });