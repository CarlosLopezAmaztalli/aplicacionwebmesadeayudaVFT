$(document).ready(function(){
    $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
});

function asignarSistema(){
    $.ajax({

        type:"POST",
        data:$('#frmAsignaSistema').serialize(),
        url:"../procesos/asignacion/asignar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();

            if(respuesta ==1){
                $('#frmAsignaSistema')[0].reset();
                $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
                Swal.fire(":)","Asignado el sistema con exito","success");
            }else{
                Swal.fire(":/","Error, el sistema no fue asignado" + respuesta,"error");
            }
        }
    });
    return false;
}


function eliminarAsignacion(idAsignacion){
    Swal.fire({
        title: 'Estas seguro de eliminar este registro?',
        text: "Una vez eliminado no podra ser recuperado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, seguro!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:"POST",
                data:"idAsignacion=" + idAsignacion,
                url:"../procesos/asignacion/eliminarAsignacion.php",
                success:function(respuesta){
                    if(respuesta ==1){
                        $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
                        Swal.fire(":)","Eliminado con exito","success");
                    }else{
                        Swal.fire(":/","Error, el sistema no fue eliminado" + respuesta,"error");
                    }
                }
            });
        }
      })
    return false;
}


