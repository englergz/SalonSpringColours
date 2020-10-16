/***************JS */

function validarEmail(email){

    var test = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-]+)\.)+([a-zA-Z0-9]{2,4})+$/;
    return test.test(email);
}

/******************** JQuery ******************/
//NEWSLETTER
function validar(){

    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;

    if(nombre==""){

    $('#resultado').html('Debes ingresar un nombre*').slideDown(500);
    $('#nombre').focus();
    return false;
    }
    else{

        if(email==""){
        $('#resultado').html('Debes ingresar un correo*').slideDown(500);
        $('#email').focus();
        return false;

        }
        else{

            if(validarEmail(email)==false){

                $('#resultado').html('Formato de Email invalido*').slideDown(500);
                $('#email').focus();
                return false;

            }else{

                inscribirse();
                $('#resultado').html('').slideUp(300);
                return true;
            }
        }
    }
}

//REGISTRAR CITA - AGENDAR
function validarRegistro(){

    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var celular = document.getElementById('cellular').value;

    if(nombre==""){
        $('#ms-nombre').html('Debes ingresar un nombre*').slideDown(500);
        $('#nombre').focus();
        return false;
    }
    else{
        $('#ms-nombre').html('').slideUp(300);
        if(email==""){
            $('#ms-email').html('Debes ingresar un correo*').slideDown(500);
            $('#email').focus();
            return false;
        }
        else{
            $('#ms-email').html('').slideUp(300);
            if(celular==""){
                $('#ms-cellular').html('Ingresar un numero de celular*').slideDown(500);
                $('#cellular').focus();
                return false;
            }
            else{
                $('#ms-cellular').html('').slideUp(300);
                if(validarEmail(email)==false){
        
                    $('#ms-email').html('Formato de Email invalido*').slideDown(500);
                    $('#email').focus();
                    return false;
            
                }else{
                    agendarCita();
                    $('#resultado').html('').slideUp(300);
                }
            }   
        }
    }
}

//CONTACTO - ENVIAR MENSAJE
function validarEnvio(){

    var nom = document.getElementById('nom').value;
    var correo = document.getElementById('correo').value;
    var mensaje = document.getElementById('mensaje').value;

    if(nom==""){
        $('#ms-nom').html('Debes ingresar un nombre*').slideDown(500);
        $('#nom').focus();
        return false;
    }
    else{
        $('#ms-nom').html('').slideUp(300);
        if(correo==""){
            $('#ms-correo').html('Debes ingresar un correo*').slideDown(500);
            $('#correo').focus();
            return false;
        }
        else{
            $('#ms-correo').html('').slideUp(300);
            if(mensaje==""){
                $('#ms-mesaje').html('Escriba un mensaje*').slideDown(500);
                $('#mensaje').focus();
                return false;
            }
            else{
                $('#ms-mensaje').html('').slideUp(300);
                if(validarEmail(correo)==false){
        
                    $('#ms-correo').html('Formato de Email invalido*').slideDown(500);
                    $('#correo').focus();
                    return false;
            
                }else{
                    enviarMensaje();
                    $('#respuesta').html('').slideUp(300);
                }
            }   
        }
    }
}

/******************** AJAX ******************/
//NEWSLETTER
function inscribirse(){

    $.ajax({
        type:"POST",
        url:"../class/guardar.php",
        data:$('#formulario').serialize(),
        success: function (response) { 
            console.log(response); 
            $("#resultado").html(response).slideDown(500);
            $("#nombre").val('');
            $("#email").val('');
            
        }
    });
}
    ///REGISTRAR CITA - AGENDAR
function mostrar(res){
    $.ajax({
        type:"GET",
        url:"../class/datos.php",
        success: function(tabla){
            $("#resultado").html(res+'<br>'+tabla).slideDown(500);
        }
    });
}
function agendarCita(){
    $.ajax({
        type:"POST",
        url:"../formularios/save_cita.php",
        data:$('#formulario').serialize(),
        success: function (response) { 
            $("#nombre").val('');
            $("#email").val('');
            $("#cellular").val('');
            mostrar(response);
        }
    });
}
    ///CONTACTO - MENSAJE
function enviarMensaje(){
    $.ajax({
        type:"POST",
        url:"../formularios/save_contacto.php",
        data:$('#form').serialize(),
        success: function (response) { 
            $("#respuesta").html(response).slideDown(500);
            $("#nom").val('');
            $("#correo").val('');
            $("#mensaje").val('');
        }
    });
}