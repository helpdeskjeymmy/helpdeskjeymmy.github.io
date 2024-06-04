$(document).ready(function(){
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
});

function agregarNuevoUsuario(){
    
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/operaciones/agregarNuevoUsuario.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                  Swal.fire(":D","Agregado con exito!","success");
            }  else {
                  Swal.fire (":(","Error al agregar!" + respuesta, "error");
            }
        }
    });

    return false;

}
function obtenerDatosUsuario(idUsuario){
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/operaciones/obtenerDatosUsuario.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#paternou').val(respuesta['paterno']);
            $('#maternou').val(respuesta['materno']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#fechaNacimientou').val(respuesta['fechaNacimiento']);
            $('#sexou').val(respuesta['sexo']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#usuariou').val(respuesta['nombreUsuario']);
            $('#idRolu').val(respuesta['idRol']);
            $('#ubicacionu').val(respuesta['ubicacion']);
        }
    });
}

function actualizarUsuario(){
    $.ajax({
        type:"POST",
        data:$('#frmActualizarUsuario').serialize(),
        url:"../procesos/usuarios/operaciones/actualizarUsuario.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#modalActualizarUsuarios').modal('hide')
                  Swal.fire(":D","Actualizado con exito!","success");

            }  else {
                  Swal.fire (":(","Error al actualizar!" + respuesta, "error");
            }
        }
    });

    return false;
}


function agregarIdUsuarioReset(idUsuario) {
    $('#idUsuarioReset').val(idUsuario);
}


function resetPassword() {

    $.ajax({
        type: "POST",
        data: $('#frmActualizaPassword').serialize(),
        url: "../procesos/usuarios/funciones/resetPassword.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#modalRessetPassword').modal('hide')
                  Swal.fire(":D","Se ha cambiado la contraseña","success");
            }  else {
                  Swal.fire (":(","No se ha podido cambiar la contraseña" + respuesta, "error");
            }
        }

    });


    return false;
}

function cambioEstatusUsuario(idUsuario, estatus) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
        url: "../procesos/usuarios/funciones/cambioEstatus.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                  Swal.fire(":D","Cambio de estatus con exito!","success");
            }  else {
                  Swal.fire (":(","Error" + respuesta, "error");
            }
        }

    });

}

function eliminarUsuario() {
    Swal.fire({
        title: "Estas seguro de eliminar este registro?",
        text: "Una vez eliminado no se podrá recuperar",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: $('#frmEliminarUsuario').serialize(),
                url: "../procesos/usuarios/operaciones/eliminarUsuario.php",
                success:function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                          Swal.fire(":D","Usuario eliminado con exito","warning");
                    }  else {
                          Swal.fire (":(","Error" + respuesta, "error");
                    }
                }
            });
         }
    
    })

    return false;
}

