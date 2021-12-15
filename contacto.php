<?php
require 'includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">

    <article class="sugerencias">
        <h1>Preguntas frecuentes</h1>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00bfd8" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <circle cx="12" cy="12" r="9" />
            <line x1="12" y1="17" x2="12" y2="17.01" />
            <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
        </svg>
    </article>
    <section class="alinear">
        <article class="preguntas">
            <div class="pregunta" id="1">
                <a class="pregunta__titulo">¿Puedo cambiar de plan?</a>
                <div class="pregunta__informacion" id="a1">
                    Claro que sí. Si eres un usuario Classic puedes cambiar tu cuenta a Premium o Enterprise tu mismo siguiendo las instrucciones que encontrarás en el calendario. En caso de que quieras que te guiemos durante este proceso, comunícate con nuestro equipo de soporte, quienes estarán encantados de ayudarte.
                </div>
            </div>
            <!--.pregunta-->
            <div class="pregunta" id="2">
                <a class="pregunta__titulo">¿Puedo cambiar de plan?</a>
                <div class="pregunta__informacion" id="a2">
                    Claro que sí. Si eres un usuario Classic puedes cambiar tu cuenta a Premium o Enterprise tu mismo siguiendo las instrucciones que encontrarás en el calendario. En caso de que quieras que te guiemos durante este proceso, comunícate con nuestro equipo de soporte, quienes estarán encantados de ayudarte.
                </div>
            </div>
            <!--.pregunta-->
        </article>
        <article class="preguntas">
            <div class="pregunta" id="3">
                <a class="pregunta__titulo">¿Puedo cambiar de plan?</a>
                <div class="pregunta__informacion" id="a3">
                    Claro que sí. Si eres un usuario Classic puedes cambiar tu cuenta a Premium o Enterprise tu mismo siguiendo las instrucciones que encontrarás en el calendario. En caso de que quieras que te guiemos durante este proceso, comunícate con nuestro equipo de soporte, quienes estarán encantados de ayudarte.
                </div>
            </div>
            <!--.pregunta-->
            <div class="pregunta" id="4">
                <a class="pregunta__titulo">¿Puedo cambiar de plan?</a>
                <div class="pregunta__informacion" id="a4">
                    Claro que sí. Si eres un usuario Classic puedes cambiar tu cuenta a Premium o Enterprise tu mismo siguiendo las instrucciones que encontrarás en el calendario. En caso de que quieras que te guiemos durante este proceso, comunícate con nuestro equipo de soporte, quienes estarán encantados de ayudarte.
                </div>
            </div>
            <!--.pregunta-->

        </article>
    </section>
    <section class="formulario--contacto">
        <form class="formulario">
            <fieldset>
                <legend>Informacion</legend>
                <label for="nombre">Nombre</label>
                <input type="text" name="" id="nombre" placeholder="Nombre">

                <label for="email">E-mail</label>
                <input type="email" name="" id="email" placeholder="E-mail">

                <label for="telefono">Telefono</label>
                <input type="tel" name="" id="telefono" placeholder="Telefono">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>
            <button type="button" onclick="sendata()" class="boton-contacto">Enviar</button>
        </form>
    </section>
</main>

<script type="text/javascript">
    const datos = {
        nombre: '',
        email: '',
        telefono: '',
        mensaje: ''
    };

    const nombre = document.querySelector('#nombre');
    const email = document.querySelector('#email');
    const telefono = document.querySelector('#telefono');
    const mensaje = document.querySelector('#mensaje');
    const formulario = document.querySelector('.formulario');

    nombre.addEventListener('input',leerTexto);
    email.addEventListener('input',leerTexto);
    telefono.addEventListener('input',leerTexto);
    mensaje.addEventListener('input',leerTexto);

function leerTexto(e){
    datos[e.target.id] =e.target.value;
}

function sendata() {
    const {nombre,email,telefono,mensaje} = datos;
    if(nombre === '' || email === '' || mensaje === '' || telefono === ''){
        mostrarError('Todos los campos son obligatorios');
        return true;
    }
    var urlx = 'http://' + window.location.hostname + '/';
    let formData = new FormData;
    formData.append("nombre",nombre);
    formData.append("email",email);
    formData.append("telefono",telefono);
    formData.append("mensaje",mensaje);

    var response = setAjaxNative(urlx + "agenda/contactoEmail.php", 'POST', formData, responsedatax);
}

function mostrarError(mensaje){
    const error = document.createElement('P');
    error.textContent = mensaje;
    error.classList.add('error');
    formulario.appendChild(error);
    setTimeout(() =>{
        error.remove();
    },4000);
}

function enviado(){
    const correcto = document.createElement('P');
    correcto.textContent = 'Correo enviado con exito';
    correcto.classList.add('correcto');
    formulario.appendChild(correcto);
    setTimeout(() =>{
        correcto.remove();
    },4000);
    nombre.value = "";
    email.value = "";
    mensaje.value = "";
    telefono.value = "";
}

    function setAjaxNative(urlx_ajax, methodx, params, callBck) {
        var hr = new XMLHttpRequest();
        hr.open(methodx, urlx_ajax, true);
        hr.onreadystatechange = function() {
            if (hr.readyState == 4 && hr.status == 200) {
                var returnval = JSON.parse(hr.responseText);
                callBck(returnval);
            }
        }
        hr.send(params);
    }

    function responsedatax(jsonx) {
        if (jsonx['status'] == 200) {
            enviado();
        } else {
            mostrarError('Error al enviar el correo');
        }
    }
</script>

<?php
incluirTemplate('footer');
?>