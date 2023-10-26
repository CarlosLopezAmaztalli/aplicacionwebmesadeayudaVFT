$(document).ready(function(){
    
    $('#tablaDispositivoLoad').load('asignacion/tablaAsignacionDispositivo.php');
});

function asignarEquipo(){
    $.ajax({

        type:"POST",
        data:$('#frmAsignaEquipo').serialize(),
        url:"../procesos/asignacion/asignarEquipo.php",
        success:function(respuesta){
            respuesta = respuesta.trim();

            if(respuesta ==1){
                $('#frmAsignaEquipo')[0].reset();
                $('#tablaDispositivoLoad').load('asignacion/tablaAsignacionDispositivo.php');
                Swal.fire(":)","Asignado el equipo con exito","success");
            }else{
                Swal.fire(":/","Error, el equipo no fue asignado" + respuesta,"error");
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
                url:"../procesos/asignacion/eliminarAsignacionEquipo.php",
                success:function(respuesta){
                    if(respuesta ==1){
                        $('#tablaDispositivoLoad').load('asignacion/tablaAsignacionDispositivo.php');
                        Swal.fire(":)","Eliminado con exito","success");
                    }else{
                        Swal.fire(":/","Error, el equipo no fue eliminado" + respuesta,"error");
                    }
                }
            });
        }
      })
    return false;
}