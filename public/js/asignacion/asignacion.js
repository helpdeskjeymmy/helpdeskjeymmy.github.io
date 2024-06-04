
$(document).ready(function(){
    $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
});

function asignarEquipo() {
    $.ajax({
        type: "POST",
        data: $('#frmAsignaEquipo').serialize(),
        url: "../procesos/asignacion/asignar.php",
        success: function(respuesta) {
            console.log(respuesta);
          respuesta = respuesta.trim();

          if (respuesta == 1 ) {
                $('#frmAsignaEquipo')[0].reset();
                $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
                Swal.fire(":D","Agregado con exito!", "success");
          } else {
            Swal.fire(":C", "Fallo al asignar" + respuesta, "error");
          }
  
        }    
    });

    return false;
}

function eliminarAsignacion(idAsignacion) {
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
                type:"POST",
                data:"idAsignacion=" +  idAsignacion,
                url:"../procesos/asignacion/eliminarAsignacion.php",
                success:function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
                        Swal.fire(":D", "Eliminado con exito!", "success");
                    } else {
                        Swal.fire(":(", "Fallo al eliminar" + respuesta, "error");
                    }
                }
            });
         }
    
    });

    return false;
}


