 $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.datepicker').datepicker();
    $(".dropdown-trigger").dropdown();

    //Editar acta nacimiento
    $("#editar_datos_nacimiento").click(function(){
    	var datos = $("#formulario_acta_nacimiento").serialize();
    	var id_acta_nacimiento = $("#id_acta_nacimiento").val();
    	$.ajax({
    		method : "POST",
    		url : "modelo/editar_acta_nacimiento.php",
    		data : datos+"&id_acta_nacimiento="+id_acta_nacimiento,
    		success : function(datos){
	            $("#avisos_editar").html(datos);
                console.log(datos);
	            datos_acta_nacimiento();
          }
    	});
     });


       $('.parallax').parallax();

    //Editar acta matrimonio 
    $("#editar_datos_matrimonio").click(function(){
        var datos = $("#formulario_acta_matrimonio").serialize();
        var id_acta_matrimonio = $("#id_acta_matrimonio").val();
        //console.log(datos);
        $.ajax({
            method : "POST",
            url : "modelo/editar_acta_matrimonio.php",
            data : datos+"&id_acta_matrimonio="+id_acta_matrimonio,
            success : function(datos){
                $("#avisos_editar_matrimonio").html(datos);
                console.log(datos);
                datos_acta_matrimonial();
          }
        });
     });

    $("#editar_datos_defuncion").click(function(){
        var datos = $("#formulario_acta_defuncion").serialize();
        var id_acta_defuncion = $("#id_acta_defuncion").val();
        console.log(datos);
        $.ajax({
            method : "POST",
            url : "modelo/editar_acta_defuncion.php",
            data : datos+"&id_acta_defuncion="+id_acta_defuncion,
            success : function(datos){
                $("#avisos_editar_defuncion").html(datos);
                console.log(datos);
                datos_acta_defuncion();
          }
        });
     });

  });
 //Todos los datos de nacimiento para mostrar con modal
 function traer_datos_editar_nac(id){
 	console.log(id);
 	$.ajax({
 		method : "POST",
 		url : "controlador/traer_datos_acta_nacimiento_controlador.php",
 		data : {id : id },
 		success : function(dato){
 			$("#datos_editar_acta_nacimiento").html(dato);
 		}
 	});
 }
//Todos los datos de matrimonio para mostrar con modal
function traer_datos_editar_matri(id){
    console.log(id);
    $.ajax({
        method : "POST",
        url : "controlador/traer_datos_acta_matrimonio_controlador.php",
        data : {id : id },
        success : function(dato){
            $("#datos_editar_acta_matrimonio").html(dato);
        }
    });
}
//Todos los datos de defuncion para mostrar con modal
function traer_datos_editar_defu(id){
    console.log(id);
    $.ajax({
        method : "POST",
        url : "controlador/traer_datos_acta_defuncion_controlador.php",
        data : {id : id },
        success : function(dato){
            $("#datos_editar_acta_defuncion").html(dato);
        }
    });
}


//Eliminar defuncion

function eliminar_defuncion(id){
    
   if (confirm('Desea eliminar este acta?')) {
        console.log("Acepto");
        $.ajax({
            method : "POST",
            url : "modelo/eliminar_defuncion.php",
            data : {id : id},
            success : function(dato){
               $("#avisos_editar_defuncion").html(dato);
               datos_acta_defuncion();
            }
        });
   }

}


//Eliminar defuncion

function eliminar_nacimiento(id){
    
   if (confirm('Desea eliminar este acta?')) {
        console.log("Acepto");
        $.ajax({
            method : "POST",
            url : "modelo/eliminar_nacimiento.php",
            data : {id : id},
            success : function(dato){
               $("#avisos").html(dato);
               datos_acta_nacimiento();
            }
        });
   }

}

//Eliminar defuncion

function eliminar_matrimonio(id){
    
   if (confirm('Desea eliminar este acta?')) {
        console.log("Acepto");
        $.ajax({
            method : "POST",
            url : "modelo/eliminar_matrimonio.php",
            data : {id : id},
            success : function(dato){
               $("#avisos_editar_matrimonio").html(dato);
               datos_acta_matrimonial();
            }
        });
   }

}
