$.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}
function decision(message, url){
    if(confirm(message)) location.href = url;
}
function confirmSubmit(form, message) { 
    var agree=confirm(message); 
    if (agree) {
        form.submit();
        return false; //de todas formas el link no se ejecutara
    } else {
        return false;
    } 
}

$('form#loginForm').validate({
	rules: {
		username: 'required',
		password: 'required'
	},
	messages: {
		username: "Ingrese un nombre de usuario",
		password: "Ingrese la contraseña"
	},
	submitHandler: function (form) {
		var accion = '';
        var cargando = '<img src="images/loader.gif" />';
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#loginForm")[0]);
        $.ajax({
            url:  $("form#loginForm").attr('action'),
            type: $("form#loginForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#loginButton").button('loading');
            },
            success:function(respuesta){
                if(respuesta.message == "error")
                {
                    $.gritter.add({
                        title: 'Error',
                        text: 'Usuario o contraseña incorrectos',
                        class_name: 'gritter-error'
                    });
                    $('form#loginForm').reset();
                    $("button#loginButton").button('reset');
                }
                else
                {
                    window.location = 'http://'+window.location.host+"/agm/dashboard";
                }
            }
        })            
        return false;
	}
});

$('form#postChangePassword').validate({
    rules: {
        usuario: 'required',
        pregunta: 'required',
        respuesta: 'required'
    },
    messages: {
        usuario: "Seleccione un usuario",
        pregunta: "Seleccione un usuario", 
        respuesta: "Ingrese la respuesta"
    },
    submitHandler: function (form) {
        var accion = '';
        var cargando = '<img src="images/loader.gif" />';
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#postChangePassword")[0]);
        $.ajax({
            url:  $("form#postChangePassword").attr('action'),
            type: $("form#postChangePassword").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#loginButton").button('loading');
            },
            success:function(respuesta){
                if(respuesta.message == "error")
                {
                    $.gritter.add({
                        title: 'Error',
                        text: 'Respuesta incorrecta',
                        class_name: 'gritter-error'
                    });
                    //$('form#postChangePassword').reset();
                    $("button#loginButton").button('reset');
                }
                else
                {
                    var valor = $("select#usuario").val();
                    window.location = 'http://'+window.location.host+"/agm/nueva-contrasena/"+valor;
                }
            }
        })            
        return false;
    }
});

$('form#postNewPassword').validate({
    rules: {
        password: 'required',
        repetir_password: {
            required: 'required',
            equalTo: '#password'
        }
    },
    messages: {
        password: "Ingrese la nueva contraseña",
        repetir_password: {
            required: "Repita la nueva contraseña",
            equalTo: "Las contraseñas deben de ser iguales"
        }
    },
    submitHandler: function (form) {
        var accion = '';
        var cargando = '<img src="images/loader.gif" />';
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#postNewPassword")[0]);
        $.ajax({
            url:  $("form#postNewPassword").attr('action'),
            type: $("form#postNewPassword").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#loginButton").button('loading');
            },
            success:function(respuesta){
                if(respuesta.message == "correcto")
                {
                    $.gritter.add({
                        title: 'Cambiado',
                        text: 'Contraseña cambiada satisfactoriamente',
                        class_name: 'gritter-success'
                    });
                    $("button#loginButton").button('reset');
                }
            }
        })            
        return false;
    }
});

$("select#usuario").on("change", function(){
    var selectUsuario = $(this);
    var valor = $(this).val();
    if(valor != "")
    {
        var url = 'http://'+window.location.host+"/agm";
        $.ajax({
            url: url + '/selectUsuario/' + valor,
            method: "GET",
            data: { _token: $('input[name=token]').val() },
            dataType: 'json',
            success: function(respuesta){
                if(respuesta.correcto){
                    $('#pregunta').val(respuesta.valorPregunta);
                }
                else
                {
                    console.log('Sin exito');
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                if(jqXHR){
                    console.log(jqXHR);
                }
            }
        });
    }
    else
    {
        $('#pregunta').val("");
    }
});

$('form#usuarioForm').validate({
    errorElement: 'span',
    errorClass: 'help-inline',
    focusInvalid: false,
    rules: {
        email: {
            required: true,
            email:true
        },
        password: {
            required: true,
            minlength: 5
        },
        password_repeat: {
            required: true,
            minlength: 5,
            equalTo: "#password"
        },
        name: {
            required: true
        },
        username: {
            required: true
        }
    },
    messages: {
        email: {
            required: "Ingrese un correo.",
            email: "Ingrese un correo válido."
        },
        password: {
            required: "Ingrese una contraseña.",
            minlength: "Ingrese un mínimo de cinco caracteres."
        },
        password_repeat: {
            required: "Repita una contraseña.",
            minlength: "Ingrese un mínimo de cinco caracteres.",
            equalTo: "Las contraseñas deben de ser iguales"
        },
        name: "Ingrese un nombre y apellido",
        username: "Ingrese un nombre de usuario"
    },
    invalidHandler: function (event, validator) { //display error alert on form submit   
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.control-group').removeClass('info').addClass('error');
    },

    success: function (e) {
        $(e).closest('.control-group').removeClass('error').addClass('success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function (form) {
        var accion = '';
        if($("button#usuarioSubmit").attr('data') == 1)
        {
            accion = 'agregado';
        }
        else if($("button#usuarioSubmit").attr('data') == 0)
        {
            accion = 'actualizado';
        }
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#usuarioForm")[0]);
        $.ajax({
            url:  $("form#usuarioForm").attr('action'),
            type: $("form#usuarioForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: new FormData($("form#usuarioForm")[0]),
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#usuarioSubmit").button('loading');
                $("button#cancelar").addClass('disabled');
            },
            success:function(respuesta){
                $.gritter.add({
                    title: 'Registrado',
                    text: 'Usuario '+accion+' satisfactoriamente.',
                    class_name: 'gritter-success'
                });
                if($("button#usuarioSubmit").attr('data') == 1)
                {
                    $('form#usuarioForm').reset();
                    $("button#usuarioSubmit").button('reset');
                    $("button#cancelar").removeClass('disabled');
                    $('#file').ace_file_input('reset_input');
                    $('div.control-group').removeClass('success');
                }
            }
        })
        return false;
    },
    invalidHandler: function (form) {
    }
});

$('form#usuarioEditForm').validate({
    errorElement: 'span',
    errorClass: 'help-inline',
    focusInvalid: false,
    rules: {
        email: {
            required: true,
            email:true
        },
        name: {
            required: true
        },
        username: {
            required: true
        }
    },
    messages: {
        email: {
            required: "Ingrese un correo.",
            email: "Ingrese un correo válido."
        },
        name: "Ingrese un nombre y apellido",
        username: "Ingrese un nombre de usuario"
    },
    invalidHandler: function (event, validator) { //display error alert on form submit   
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.control-group').removeClass('info').addClass('error');
    },

    success: function (e) {
        $(e).closest('.control-group').removeClass('error').addClass('success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function (form) {
        var accion = '';
        if($("button#usuarioSubmit").attr('data') == 1)
        {
            accion = 'agregado';
        }
        else if($("button#usuarioSubmit").attr('data') == 0)
        {
            accion = 'actualizado';
        }
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#usuarioForm")[0]);
        $.ajax({
            url:  $("form#usuarioEditForm").attr('action'),
            type: $("form#usuarioEditForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: new FormData($("form#usuarioEditForm")[0]),
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#usuarioSubmit").button('loading');
                $("button#cancelar").addClass('disabled');
            },
            success:function(respuesta){
                $.gritter.add({
                    title: 'Registrado',
                    text: 'Usuario '+accion+' satisfactoriamente.',
                    class_name: 'gritter-success'
                });
                if($("button#usuarioSubmit").attr('data') == 0)
                {
                    $("button#usuarioSubmit").button('reset');
                    $("button#cancelar").removeClass('disabled');
                    var url = 'http://'+window.location.host+"/agm";
                    $.ajax({
                        url: url + '/dashboard/imagenUsuario/' + respuesta.nuevoContenido.id,
                        method: "GET",
                        data: { _token: $('input[name=token]').val() },
                        dataType: 'json',
                        success: function(respuestaUsuario){
                            if(respuestaUsuario.correcto){
                                $('#cambiante').empty();
                                $('#navbarCambiante').empty();
                                var contenido = '<img id="avatar2" alt="'+respuestaUsuario.usuario.name+' foto" src="'+url+'/uploads/usuarios/'+respuestaUsuario.usuario.path+'" />';
                                var navbarContenido = '<img class="nav-user-photo" src="'+url+'/uploads/usuarios/'+respuestaUsuario.usuario.path+'" alt="Foto de '+respuestaUsuario.usuario.name+'" />';
                                navbarContenido += '<span class="user-info"><small>Bienvenido,</small>'+respuestaUsuario.usuario.name+'</span><i class="icon-caret-down"></i>';
                                $('#cambiante').html(contenido);
                                $('#navbarCambiante').html(navbarContenido);
                            }
                            else
                            {
                                console.log('Sin exito');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            if(jqXHR){
                                console.log(jqXHR);
                            }
                        }
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                if(jqXHR){
                    console.log(jqXHR);
                }
            }
        })
        return false;
    },
    invalidHandler: function (form) {
    }
});

$('form#clienteForm').validate({
    errorElement: 'span',
    errorClass: 'help-inline',
    focusInvalid: false,
    rules: {
        correo: {
            required: true,
            email:true
        },
        nombre: {
            required: true
        },
        apellido: {
            required: true
        },
        cedula: {
            required: true,
            number: true
        },
        telefono: {
            required: true,
            number: true
        }
    },
    messages: {
        correo: {
            required: "Ingrese un correo.",
            email: "Ingrese un correo válido."
        },
        nombre: "Ingrese un nombre",
        apellido: "Ingrese un apellido",
        cedula: {
            required: "Ingrese un número de cédula",
            number: "Ingrese solo números"
        },
        telefono: {
            required: "Ingrese un número de teléfono",
            number: "Ingrese solo números"
        }
    },
    invalidHandler: function (event, validator) { //display error alert on form submit   
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.control-group').removeClass('info').addClass('error');
    },

    success: function (e) {
        $(e).closest('.control-group').removeClass('error').addClass('success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function (form) {
        var accion = '';
        if($("button#clienteSubmit").attr('data') == 1)
        {
            accion = 'agregado';
        }
        else if($("button#clienteSubmit").attr('data') == 0)
        {
            accion = 'actualizado';
        }
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#clienteForm")[0]);
        $.ajax({
            url:  $("form#clienteForm").attr('action'),
            type: $("form#clienteForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: new FormData($("form#clienteForm")[0]),
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#clienteSubmit").button('loading');
                $("button#cancelar").addClass('disabled');
            },
            success:function(respuesta){
                $.gritter.add({
                    title: 'Registrado',
                    text: 'Cliente '+accion+' satisfactoriamente.',
                    class_name: 'gritter-success'
                });
                if($("button#clienteSubmit").attr('data') == 1)
                {
                    $('form#clienteForm').reset();
                    $('div.control-group').removeClass('success');
                }
                $("button#clienteSubmit").button('reset');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    },
    invalidHandler: function (form) {
    }
});

$('form#productoForm').validate({
    errorElement: 'span',
    errorClass: 'help-inline',
    focusInvalid: false,
    rules: {
        nombre: {
            required: true
        },
        precioCosto: {
            required: true,
            number: true,
            min: 1
        },
        precioVenta: {
            required: true,
            number: true,
            min: 1
        }
    },
    messages: {
        nombre: "Ingrese un nombre",
        precioCosto: {
            required: "Ingrese un precio de costo",
            number: "Ingrese solo números",
            min: "Ingrese un monto mayor o igual a uno (1)"
        },
        precioVenta: {
            required: "Ingrese un precio de venta",
            number: "Ingrese solo números",
            min: "Ingrese un monto mayor o igual a uno (1)"
        }
    },
    invalidHandler: function (event, validator) { //display error alert on form submit   
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.control-group').removeClass('info').addClass('error');
    },

    success: function (e) {
        $(e).closest('.control-group').removeClass('error').addClass('success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function (form) {
        var accion = '';
        if($("button#productoSubmit").attr('data') == 1)
        {
            accion = 'agregado';
        }
        else if($("button#productoSubmit").attr('data') == 0)
        {
            accion = 'actualizado';
        }
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#productoForm")[0]);
        $.ajax({
            url:  $("form#productoForm").attr('action'),
            type: $("form#productoForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: new FormData($("form#productoForm")[0]),
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#productoSubmit").button('loading');
                $("button#cancelar").addClass('disabled');
            },
            success:function(respuesta){
                $.gritter.add({
                    title: 'Registrado',
                    text: 'Producto '+accion+' satisfactoriamente.',
                    class_name: 'gritter-success'
                });
                if($("button#productoSubmit").attr('data') == 1)
                {
                    $('form#productoForm').reset();
                    $('div.control-group').removeClass('success');
                    $('#file').ace_file_input('reset_input');
                }
                else if($("button#productoSubmit").attr('data') == 0)
                {
                    var url = 'http://'+window.location.host+"/agm";
                    $.ajax({
                        url: url + '/dashboard/imagenProducto/' + respuesta.nuevoContenido.id,
                        method: "GET",
                        data: { _token: $('input[name=token]').val() },
                        dataType: 'json',
                        success: function(respuestaProducto){
                            if(respuestaProducto.correcto){
                                $('#cambiante').empty();
                                var contenido = '<img id="avatar2" alt="'+respuestaProducto.producto.nombre+' foto" src="'+url+'/uploads/productos/'+respuestaProducto.producto.path+'" />';
                                $('#cambiante').html(contenido);
                            }
                            else
                            {
                                console.log('Sin exito');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            if(jqXHR){
                                console.log(jqXHR);
                            }
                        }
                    });
                }
                $("button#productoSubmit").button('reset');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    },
    invalidHandler: function (form) {
    }
});

$('form#inventarioForm').validate({
    errorElement: 'span',
    errorClass: 'help-inline',
    focusInvalid: false,
    rules: {
        producto: {
            required: true
        },
        cantidad: {
            required: true,
            number: true
        }
    },
    messages: {
        producto: "Seleccione un producto",
        cantidad: {
            required: "Ingrese una cantidad",
            number: "Ingrese solo números"
        }
    },
    invalidHandler: function (event, validator) { //display error alert on form submit   
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.control-group').removeClass('info').addClass('error');
    },

    success: function (e) {
        $(e).closest('.control-group').removeClass('error').addClass('success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function (form) {
        var accion = '';
        if($("button#inventarioSubmit").attr('data') == 1)
        {
            accion = 'agregado';
        }
        else if($("button#inventarioSubmit").attr('data') == 0)
        {
            accion = 'actualizado';
        }
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#inventarioForm")[0]);
        $.ajax({
            url:  $("form#inventarioForm").attr('action'),
            type: $("form#inventarioForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: new FormData($("form#inventarioForm")[0]),
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#inventarioSubmit").button('loading');
                $("button#cancelar").addClass('disabled');
            },
            success:function(respuesta){
                $.gritter.add({
                    title: 'Registrado',
                    text: 'Registro '+accion+' satisfactoriamente.',
                    class_name: 'gritter-success'
                });
                if($("button#inventarioSubmit").attr('data') == 1)
                {
                    $('form#inventarioForm').reset();
                    $('div.control-group').removeClass('success');
                }
                $("button#inventarioSubmit").button('reset');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    },
    invalidHandler: function (form) {
    }
});

$("select#producto").on("change", function(){
    var selectInventario = $(this);
    var valor = $(this).val();
    if(valor != "")
    {
        var url = 'http://'+window.location.host+"/agm";
        $.ajax({
            url: url + '/dashboard/selectProducto/' + valor,
            method: "GET",
            data: { _token: $('input[name=token]').val() },
            dataType: 'json',
            success: function(respuesta){
                if(respuesta.correcto){
                    $('#limite').val(respuesta.total);
                }
                else
                {
                    console.log('Sin exito');
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                if(jqXHR){
                    console.log(jqXHR);
                }
            }
        });
    }
    else
    {
        $('#limite').val("");
    }
}).change();

$('form#ventaForm').validate({
    errorElement: 'span',
    errorClass: 'help-inline',
    focusInvalid: false,
    rules: {
        cliente: {
            required: true
        },
        producto: {
            required: true
        },
        cantidad: {
            required: true,
            number: true
        }
    },
    messages: {
        cliente: "Seleccione un cliente",
        producto: "Seleccione un producto",
        cantidad: {
            required: "Ingrese una cantidad",
            number: "Ingrese solo números"
        }
    },
    invalidHandler: function (event, validator) { //display error alert on form submit   
        $('.alert-error', $('.login-form')).show();
    },

    highlight: function (e) {
        $(e).closest('.control-group').removeClass('info').addClass('error');
    },

    success: function (e) {
        $(e).closest('.control-group').removeClass('error').addClass('success');
        $(e).remove();
    },
    errorPlacement: function (error, element) {
        if(element.is(':checkbox') || element.is(':radio')) {
            var controls = element.closest('.controls');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
        }
        else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
        }
        else if(element.is('.chzn-select')) {
            error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
        }
        else error.insertAfter(element);
    },
    submitHandler: function (form) {
        var accion = '';
        if($("button#ventaSubmit").attr('data') == 1)
        {
            accion = 'agregada';
        }
        else if($("button#ventaSubmit").attr('data') == 0)
        {
            accion = 'actualizada';
        }
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#ventaForm")[0]);
        if(parseInt($('#cantidad').val()) <= parseInt($('#limite').val()))
        {
            if($('#apartar').is(':checked'))
            {
                $.ajax({
                    url:  $("form#ventaForm").attr('action'),
                    type: $("form#ventaForm").attr('method'),
                    headers: {'X-CSRF-TOKEN' : token},
                    data: new FormData($("form#ventaForm")[0]),
                    processData: false,
                    contentType: false,
                    beforeSend:function(){
                        $("button#ventaSubmit").button('loading');
                        $("button#cancelar").addClass('disabled');
                    },
                    success:function(respuesta){
                        $.gritter.add({
                            title: 'Registrado',
                            text: 'Vente '+accion+' satisfactoriamente.',
                            class_name: 'gritter-success'
                        });
                        if($("button#ventaSubmit").attr('data') == 1)
                        {
                            $('form#ventaForm').reset();
                            $('div.control-group').removeClass('success');
                        }
                        $("button#ventaSubmit").button('reset');
                        $("button#cancelar").removeClass('disabled');
                    }
                })
            }
            else if(!$('#apartar').is(':checked'))
            {
                if(confirm("¿Esta seguro/a de los datos ingresados? Esta acción no se puede deshacer"))
                {
                    $.ajax({
                        url:  $("form#ventaForm").attr('action'),
                        type: $("form#ventaForm").attr('method'),
                        headers: {'X-CSRF-TOKEN' : token},
                        data: new FormData($("form#ventaForm")[0]),
                        processData: false,
                        contentType: false,
                        beforeSend:function(){
                            $("button#ventaSubmit").button('loading');
                            $("button#cancelar").addClass('disabled');
                        },
                        success:function(respuesta){
                            $.gritter.add({
                                title: 'Registrado',
                                text: 'Vente '+accion+' satisfactoriamente.',
                                class_name: 'gritter-success'
                            });
                            if($("button#ventaSubmit").attr('data') == 1)
                            {
                                $('form#ventaForm').reset();
                                $('div.control-group').removeClass('success');
                            }
                            $("button#ventaSubmit").button('reset');
                            $("button#cancelar").removeClass('disabled');
                        }
                    })
                }
            }
                    
        }
        else if(parseInt($('#cantidad').val()) > parseInt($('#limite').val()))
        {
            $.gritter.add({
                title: 'Advertencia',
                text: 'La cantidad ingresada supera la registrada en inventario.',
                class_name: 'gritter-warning'
            });
        }
        return false;
    },
    invalidHandler: function (form) {
    }
});

$("#consulta").submit(function () { 
    var form = "#consulta";
    var str = $(form).serialize();

    $.ajax({  
        type: "POST",
        url: "/cantv/modulos/consulta-reportes/consulta-reportesbd.php",
        data: str,
        success: function (respuesta) {
            $("#result").html(respuesta);
        }
    });

    return false;
});

$("#reporte").click(function(){

    var contratado  = 0;
    var fijo        = 0;
    var pasante     = 0;
    var tesista     = 0;

    if( $("input[name=contratado]").prop('checked') ) {
        contratado = 1;
    }
    if( $("input[name=fijo]").prop('checked') ) {
        fijo = 1;
    }
    if( $("input[name=pasante]").prop('checked') ) {
        pasante = 1;
    }
    if( $("input[name=tesista]").prop('checked') ) {
        tesista = 1;
    }

    var resultado   = "c="+contratado+"&f="+fijo+"&p="+pasante+"&t="+tesista;
    console.log(resultado);
    window.open('../../reportes/pdf_consulta.php?'+resultado,'_blank');
});