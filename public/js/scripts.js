$(document).ready(function(){
    $("#especialidad").change(function(){
        var idEspecialidad = $(this).val();
        var idCentromedico = $("#centromedico").val();
        $.get('/Profesional?idEspecialidad=' + idEspecialidad + '&idCentromedico=' + idCentromedico,  function(data){                    
            $("#profesional").empty();
            $.each(data, function(i, pro){
                $("#profesional").append("<option value='" + pro.id_profesional + "'>" + pro.nombres_profesional + " " + pro.apellidos_profesional + "</option>");
            });
        });

        var fechaActual = new Date();
        var horaActual = fechaActual.getHours() + ":" + fechaActual.getMinutes();
        var fecha = $("#fechaReserva").val();
        var idProfesional = $(this).val();
        $.get('/HorarioDisponibleProfesional?horaActual=' + horaActual + '&fecha=' + fecha + "&idProfesional=" + idProfesional , function(data){                    
            $("#horario").empty();
            $.each(data, function(i, hor){
                $("#horario").append("<option value='" + hor.id_horario + "'>" + hor.hora_horario +  "</option>");
            });
        });
    });

    $("#centromedico").change(function(){
        var idEspecialidad = $("#especialidad").val();
        var idCentromedico = $(this).val();
        $.get('/Profesional?idEspecialidad=' + idEspecialidad + '&idCentromedico=' + idCentromedico,  function(data){                    
            $("#profesional").empty();
            $.each(data, function(i, pro){
                $("#profesional").append("<option value='" + pro.id_profesional + "'>" + pro.nombres_profesional + " " + pro.apellidos_profesional + "</option>");
            });
        });

        var fechaActual = new Date();
        var horaActual = fechaActual.getHours() + ":" + fechaActual.getMinutes();
        var fecha = $("#fechaReserva").val();
        var idProfesional = $(this).val();
        $.get('/HorarioDisponibleProfesional?horaActual=' + horaActual + '&fecha=' + fecha + "&idProfesional=" + idProfesional , function(data){                    
            $("#horario").empty();
            $.each(data, function(i, hor){
                $("#horario").append("<option value='" + hor.id_horario + "'>" + hor.hora_horario +  "</option>");
            });
        });
    });

    var idEspecialidad = $("#especialidad").val();
    var idCentromedico = $("#centromedico").val();
    $.get('/Profesional?idEspecialidad=' + idEspecialidad + '&idCentromedico=' + idCentromedico,  function(data){                    
        $("#profesional").empty();
        $.each(data, function(i, pro){
            $("#profesional").append("<option value='" + pro.id_profesional + "'>" + pro.nombres_profesional + " " + pro.apellidos_profesional + "</option>");
        });
    });

    $("#rutPaciente").rut({
        formatOn: 'keyup',
        minimumLength: 8,
        validateOn: 'change'
    });

    $("#centromedico").blur(function(){
        if($("#profesional").val() === null) {
            $( "#btnCrearReserva" ).prop( "disabled", true );
            event.preventDefault();
        } else {
            $( "#btnCrearReserva" ).prop( "disabled", false );
        } 
    });

    $("#especialidad").blur(function(){
        if($("#profesional").val() === null) {
            $( "#btnCrearReserva" ).prop( "disabled", true );
            event.preventDefault();
        } else {
            $( "#btnCrearReserva" ).prop( "disabled", false );
        } 
    });

    $("#rutPaciente").blur(function(){
        if($(this).val() === ''){
            $("#errorRutPaciente").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorRutPaciente'>El RUT Es Obligatorio!</span");
            $(this).css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
    
            if(!$.validateRut($(this).val())) {
                $("#errorRutPaciente").remove();
                $(this).after("<span style='color: #dd4b39;' id='errorRutPaciente'>Debes Ingresar Un Rut Valido!</span");
                $(this).css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRutPaciente").remove();
                $(this).css("border-color", "#00a65a");
            }
        }
    });

    $("#fechaReserva").blur(function(){
        if($(this).val() === '') {
            $("#errorFechaReserva").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorFechaReserva'>La Fecha De Reserva Es Obligatorio!</span");
            $(this).css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorFechaReserva").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#formCrearReserva").submit(function(event){
        if($("#rutPaciente").val() === ''){
            $("#errorRutPaciente").remove();
            $("#rutPaciente").after("<span style='color: #dd4b39;' id='errorRutPaciente'>El RUT Es Obligatorio!</span");
            $("#rutPaciente").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {

            if(!$.validateRut($("#rutPaciente").val())) {
                $("#errorRutPaciente").remove();
                $("#rutPaciente").after("<span style='color: #dd4b39;' id='errorRutPaciente'>Debes Ingresar Un Rut Valido!</span");
                $("#rutPaciente").css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRut").remove();
                $("#errorRutPaciente").css("border-color", "#00a65a");
            }
        }
        
        if($("#fechaReserva").val() === '') {
            $("#errorFechaReserva").remove();
            $("#fechaReserva").after("<span style='color: #dd4b39;' id='errorFechaReserva'>La Fecha De Reserva Es Obligatorio!</span");
            $("#fechaReserva").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorFechaReserva").remove();
            $("#fechaReserva").css("border-color", "#00a65a");
        }

        if($("#horario").val() === '') {
            $("#errorHorario").remove();
            $("#horario").after("<span style='color: #dd4b39;' id='errorHorario'>No Hay Horario Para Esta Fecha Y/O Profesional!</span");
            $("#horario").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorHorario").remove();
            $("#horario").css("border-color", "#00a65a");
        }

        if($("#profesional").val() === null || $("#profesional").val() === '') {
            $("#errorProfesional").remove();
            $("#profesional").after("<span style='color: #dd4b39;' id='errorProfesional'>No Hay Profesional Para Este Centromedico Y/O Especialidad!</span");
            $("#profesional").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorProfesional").remove();
            $("#profesional").css("border-color", "#00a65a");
        }
    });

    $("#rutPacienteConsultar").rut({
        formatOn: 'keyup',
        minimumLength: 8,
        validateOn: 'change'
    });

    $("#rutPacienteConsultar").blur(function(){
        if($(this).val() === ''){
            $("#errorRutPaciente").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorRutPaciente'>El RUT Es Obligatorio!</span");
            $(this).css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
    
            if(!$.validateRut($(this).val())) {
                $("#errorRutPaciente").remove();
                $(this).after("<span style='color: #dd4b39;' id='errorRutPaciente'>Debes Ingresar Un Rut Valido!</span");
                $(this).css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRutPaciente").remove();
                $(this).css("border-color", "#00a65a");
            }
        }
    });

    $("#nombreUsuario").blur(function(){
        if($(this).val() === '') {
            $("#errorNombreUsuario").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorNombreUsuario'>El Nombre De Usuario Es Obligatorio!</span");
            $(this).css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorNombreUsuario").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#profesional").blur(function(){
        if($("#profesional").val() === null || $("#profesional").val() === '') {
            $("#errorProfesional").remove();
            $("#profesional").after("<span style='color: #dd4b39;' id='errorProfesional'>No Hay Profesional Para Este Centromedico Y/O Especialidad!</span");
            $("#profesional").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorProfesional").remove();
            $("#profesional").css("border-color", "#00a65a");
        }
    });

    $("#correoUsuario").blur(function(){
        if($(this).val() === '') {
            $("#errorCorreoUsuario").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorCorreoUsuario'>El Correo De Usuario Es Obligatorio!</span");
            $(this).css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCorreoUsuario").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#claveUsuario").blur(function(){
        if($(this).val() === '') {
            $("#errorClaveUsuario").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorClaveUsuario'>La Clave De Usuario Es Obligatorio!</span");
            $(this).css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorClaveUsuario").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#formAgregarUsuario").submit(function(event){
        
        if($("#nombreUsuario").val() === '') {
            $("#errorNombreUsuario").remove();
            $("#nombreUsuario").after("<span style='color: #dd4b39;' id='errorNombreUsuario'>El Nombre De Usuario Es Obligatorio!</span");
            $("#nombreUsuario").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorNombreUsuario").remove();
            $("#nombreUsuario").css("border-color", "#00a65a");
        }

        if($("#correoUsuario").val() === '') {
            $("#errorCorreoUsuario").remove();
            $("#correoUsuario").after("<span style='color: #dd4b39;' id='errorCorreoUsuario'>El Correo De Usuario Es Obligatorio!</span");
            $("#correoUsuario").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCorreoUsuario").remove();
            $("#correoUsuario").css("border-color", "#00a65a");
        }

        if($("#claveUsuario").val() === '') {
            $("#errorClaveUsuario").remove();
            $("#claveUsuario").after("<span style='color: #dd4b39;' id='errorClaveUsuario'>La Clave De Usuario Es Obligatorio!</span");
            $("#claveUsuario").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorClaveUsuario").remove();
            $("#claveUsuario").css("border-color", "#00a65a");
        }
    });

    $("#formActualizarUsuario").submit(function(event){
        
        if($("#nombreUsuario").val() === '') {
            $("#errorNombreUsuario").remove();
            $("#nombreUsuario").after("<span style='color: #dd4b39;' id='errorNombreUsuario'>El Nombre De Usuario Es Obligatorio!</span");
            $("#nombreUsuario").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorNombreUsuario").remove();
            $("#nombreUsuario").css("border-color", "#00a65a");
        }

        if($("#correoUsuario").val() === '') {
            $("#errorCorreoUsuario").remove();
            $("#correoUsuario").after("<span style='color: #dd4b39;' id='errorCorreoUsuario'>El Correo De Usuario Es Obligatorio!</span");
            $("#correoUsuario").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCorreoUsuario").remove();
            $("#correoUsuario").css("border-color", "#00a65a");
        }

        if($("#claveUsuario").val() === '') {
            $("#errorClaveUsuario").remove();
            $("#claveUsuario").after("<span style='color: #dd4b39;' id='errorClaveUsuario'>La Clave De Usuario Es Obligatorio!</span");
            $("#claveUsuario").css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorClaveUsuario").remove();
            $("#claveUsuario").css("border-color", "#00a65a");
        }
    });


    $("#formRealizarConsulta").submit(function(event){
        if($("#rutPacienteConsultar").val() === ""){
            $("#errorRutPaciente").remove();
            $("#rutPacienteConsultar").after("<span style='color: #dd4b39;' id='errorRutPaciente'>El RUT Es Obligatorio!</span");
            $("#rutPacienteConsultar").css("border-color", "#dd4b39");
            event.preventDefault();
        }else {
            if(!$.validateRut($("#rutPacienteConsultar").val())) {
                $("#errorRutPaciente").remove();
                $("#rutPacienteConsultar").after("<span style='color: #dd4b39;' id='errorRutPaciente'>Debes Ingresar Un Rut Valido!</span");
                $("#rutPacienteConsultar").css("border-color", "#dd4b39");
                event.preventDefault();
            } else {
                $("#errorRutPaciente").remove();
                $("#rutPacienteConsultar").css("border-color", "#00a65a");
            }
        }
    });

    $("#formLogin").submit(function(event){
        if($("#correoUsuarioAut").val() === ""){
            $("#errorCorreoAut").remove();
            $("#correoUsuarioAut").after("<span style='color: #dd4b39;' id='errorCorreoAut'>El Correo Es Obligatorio!</span");
            $("#correoUsuarioAut").css("border-color", "#dd4b39");
            event.preventDefault();
        }else {
            $("#errorCorreoAut").remove();
            $("#correoUsuarioAut").css("border-color", "#00a65a");
        }

        if($("#claveUsuarioAut").val() === ""){
            $("#errorClaveUsuarioAut").remove();
            $("#claveUsuarioAut").after("<span style='color: #dd4b39;' id='errorClaveUsuarioAut'>La Clave Es Obligatorio!</span");
            $("#claveUsuarioAut").css("border-color", "#dd4b39");
            event.preventDefault();
        }else {
            $("#errorClaveUsuarioAut").remove();
            $("#claveUsuarioAut").css("border-color", "#00a65a");
        }
    });

    $("#correoUsuarioAut").blur(function(){
        if($(this).val() === '') {
            $("#errorCorreoAut").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorCorreoAut'>El Correo Es Obligatorio!</span");
            $(this).css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorCorreoAut").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $("#claveUsuarioAut").blur(function(){
        if($(this).val() === '') {
            $("#errorClaveUsuarioAut").remove();
            $(this).after("<span style='color: #dd4b39;' id='errorClaveUsuarioAut'>La Clave Es Obligatorio!</span");
            $(this).css("border-color", "#dd4b39");
            event.preventDefault();
        } else {
            $("#errorClaveUsuarioAut").remove();
            $(this).css("border-color", "#00a65a");
        } 
    });

    $(".mensajes").fadeOut(20000);

    $("#fechaReserva").change(function(){
        var fechaActual = new Date();
        var horaActual = fechaActual.getHours() + ":" + fechaActual.getMinutes();
        var fecha = $("#fechaReserva").val();
        $.get('/HorarioDisponible?horaActual=' + horaActual + '&fecha=' + fecha, function(data){                    
            if(data.length === 0)
            {
                $( "#btnCrearReserva" ).prop( "disabled", true );
            }
            else
            {
                $( "#btnCrearReserva" ).prop( "disabled", false );
            }
            $("#horario").empty();
            $.each(data, function(i, hor){
                $("#horario").append("<option value='" + hor.id_horario + "'>" + hor.hora_horario +  "</option>");
            });
        });
    });

    if($("#horario").val() === null)
    {
        $( "#btnCrearReserva" ).prop( "disabled", true );
    }
    else
    {
        $( "#btnCrearReserva" ).prop( "disabled", false );
    }

    $("#profesional").change(function(){
        var fechaActual = new Date();
        var horaActual = fechaActual.getHours() + ":" + fechaActual.getMinutes();
        var fecha = $("#fechaReserva").val();
        var idProfesional = $(this).val();
        $.get('/HorarioDisponibleProfesional?horaActual=' + horaActual + '&fecha=' + fecha + "&idProfesional=" + idProfesional , function(data){                    
            $("#horario").empty();
            $.each(data, function(i, hor){
                $("#horario").append("<option value='" + hor.id_horario + "'>" + hor.hora_horario +  "</option>");
            });
        });

        if($("#profesional").val() === "" || $("#horario").val() === "")
        {
            $( "#btnCrearReserva" ).prop( "disabled", true );
        }
        else
        {
            $( "#btnCrearReserva" ).prop( "disabled", false );
        }
    });
});