document.addEventListener('DOMContentLoaded',function(){
    eventListeners();
});

function eventListeners(){
    const pregunta = document.querySelectorAll('.pregunta');
    pregunta.forEach(div => {
        div.addEventListener('click',desplegar);
    });
    // pregunta.addEventListener('click',desplegar);
    //RECUPERAR
    const recuperar = document.querySelector('.recuperar');
    recuperar.addEventListener('click',recuperarP);
    //CANCELAR
    const cancelar = document.querySelector('.cancelar');
    cancelar.addEventListener('click',cancela);
    const cancelar2 = document.querySelector('.cancelar2');
    cancelar2.addEventListener('click',cancela2);
    //REGISTRAR
    const registrar = document.querySelector('.registrarse');
    registrar.addEventListener('click',registra);

}

function desplegar(e){
    const id = e.target.getAttribute('id');
    const informacion = document.querySelector(`#a${id}`);
    if(informacion.classList.contains('mostrar')){
        informacion.classList.remove('mostrar');
    }else{
        informacion.classList.add('mostrar');
    }
}

function recuperarP(){
    const div = document.querySelector('.form--login');
    div.classList.add('ocultar');
    const div2 = document.querySelector('.form--login2');
    div2.classList.add('mostrar');
    const titulo = document.querySelector('.form--titulo');
    titulo.innerHTML = 'RECUPERAR';
}
function registra(){
    const div = document.querySelector('.form--login');
    div.classList.add('ocultar');
    const div2 = document.querySelector('.form--login3');
    div2.classList.add('mostrar');
    const titulo = document.querySelector('.form--titulo');
    titulo.innerHTML = 'REGISTRO';
    const div3 = document.querySelector('.login');
    div3.classList.add('aumentar');
}
function cancela(){
    const div = document.querySelector('.form--login');
    div.classList.remove('ocultar');
    const div2 = document.querySelector('.form--login2');
    div2.classList.remove('mostrar');
    const titulo = document.querySelector('.form--titulo');
    titulo.innerHTML = 'INICIAR SESIÓN';
}
function cancela2(){
    const div = document.querySelector('.form--login');
    div.classList.remove('ocultar');
    const div2 = document.querySelector('.form--login3');
    div2.classList.remove('mostrar');
    const div3 = document.querySelector('.login');
    div3.classList.add('aumentar');
    const titulo = document.querySelector('.form--titulo');
    titulo.innerHTML = 'INICIAR SESIÓN';
}