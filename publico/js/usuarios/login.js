function loginUsuario() {
    $.ajax({
        type:"POST",
        data:$('#frmLogin').serialize(),
        url:"procesos/usuarios/login/loginUsuario.php",
        success:function(respuesta){
            respuesta=respuesta.trim();
            if(respuesta==1){
                window.location.href="vistas/inicio.php";
            }else if(respuesta==2){
                window.location.href="vistas/inicioAdmin.php";
            }else if(respuesta==3){
                window.location.href="vistas/inicioAdmin.php";
            }else if(respuesta==4){
                window.location.href="vistas/inicio.php";
            }
            else{
                swal.fire(":(","Error al entrar!" + respuesta,"error");
            }
        }
    });
    return false;
}