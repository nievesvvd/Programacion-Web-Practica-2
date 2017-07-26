function validacion() {
    // document.getElementById('access').disabled=true;
    //Comprobación del Nombre
    var nombre = document.getElementById("nomb").value;
    if ( nombre == null || nombre.length == 0 ) {
        alert("El Nombre no es correcto");
        return false;
    }else if(nombre.length >10){
        alert("El nombre es muy largo");
        return false;
    }

    //Comprobación de los Apellidos
    var apellidos = document.getElementById("apell").value;
     if ( apellidos == null || apellidos.length == 0 ) {
        alert("El apellido no es correcto");
        return false;
    }else if(nombre.length >10){
        alert("El apellido es muy largo");
        return false;
    }

    //Comprobación del NombreUsuario
    var username = document.getElementById("user").value;
    if ( username == null || username.length == 0 || /^\s+$/.test(username) ) {
        alert("El Nombre de usuario no es correcto");
        return false;
    }else if(nombre.length >10){
        alert("El nombre de usuario es muy largo");
        return false;
    }

    //Comprobación de la Contraseña
    var pass = document.getElementById("passw").value;
    if ( pass == null || pass.length == 0) {
        alert("La contraseña no puede estar vacia");
        return false;
    }

    //Comprobación de la Contraseña repetida
    var pass2 = document.getElementById("passwRep").value;
    if ( pass2 == null || pass2.length == 0) {
        alert("La contraseña no puede estar vacia");
        return false;
    }
    if (pass !== pass2){
        alert("Las contraseñas no coinciden");
        return false;
    }
    // else{
    //     enableButton(true);
    // }

    return true;
}

// function enableButton(value){
//     if (value== true){
//         document.getElementById('access').disabled=false;
//     }
// }

function validarLong(){
    var titulo = document.getElementById("tituloEntrada").value;
    if ( titulo == null || titulo.length == 0 ) {
        alert("El titulo no puede estar vacío");
        return false;
    }
    var cuerpo = document.getElementById("cuerpoEntrada").value;
    if ( cuerpo == null || cuerpo.length ==0 ) {
        alert("El cuerpo de la entrada no puede estar vacío!");
        return false;
    }else if(cuerpo.length > 500){
        alert("El cuerpo de la entrada es muy largo!");
        return false;
    }
    return true;
}

function validarComent(){
    var coment = document.getElementById("cuerpoEntr").value;
    if ( coment || coment.length == 0 ) {
        alert("El comentario no puede estar vacío");
        return false;
    }else if(coment>200){
        alert("El comentario es demasiado largo");
        return false;
    }
    return true;
}