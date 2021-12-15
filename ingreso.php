<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="build/css/app.css">
  <script src="build/js/bundle.js"></script>
  <meta charset="utf-8">
  <title>Login</title>
</head>

<body class="fondo">
  <main>
    <a class="enlace--form" href="index.php">Regresar al sitio Web</a>
    <div class="login">
      <h1 class="form--titulo">INICIAR SESIÓN</h1>
      <form class="form--login">
        <div>
          <input class="input" id="username" type="text" name="usuario" placeholder="Ingrese su Usuario">
        </div>
        <div>
          <input class="input" id="password" type="password" name="password" placeholder="Ingrese su Contraseña">
        </div>
        <div >
          <button type="button" onclick="sendata()" >INGRESAR</button>
        </div>
        <a class="enlace--form recuperar" >¿Olvidaste la contraseña?</a>
        <a class="enlace--form registrarse" >Registrate</a>
      </form>
      <!-- RECUPERAR CONTRASEÑA -->
      <form class="form--login2 ocultar">
        <div>
          <input class="input" id="recup" type="text" name="usuario" placeholder="Ingrese su Correo">
        </div>
        <div >
          <button type="button" onclick="sendata2()" >ENVIAR CORREO</button>
        </div>
        <a class="enlace--form cancelar" >Cancelar</a>
      </form>
      <!-- FIN RECUPERAR CONTRASEÑA -->
      <!-- REGISTRARSE -->
      <form class="form--login3 ocultar">
        <div class="ordenar">
          <input class="input" id="nombre" type="text" name="usuario" placeholder="Nombre">
          <input class="input" id="apellido" type="text" name="usuario" placeholder="Apellido">
        </div>
        <div class="ordenar">
          <input class="input" id="user" type="text" name="usuario" placeholder="Ingrese su Usuario">
          <input class="input" id="pas" type="text" name="usuario" placeholder="Ingrese su Password">
        </div>
        <div class="ordenar">
          <input class="input" id="cor" type="text" name="usuario" placeholder="Ingrese su Correo">
        </div>
        <div id="div_file">
          <p id="texto">Foto de perfil</p>
          <input type="file" class="archivo" name="imagen" id="imagen" >
        </div>
        <div>
          <button type="button" onclick="sendata3()" >REGISTRARSE</button>
        </div>
        <a class="enlace--form cancelar2" >Cancelar</a>
      </form>
    </div>
  </main>
  <!-- <div class="container">
      <div class="row">
        <form>
          <div class="col-lg-12 col-md-12">
            <label for="" class="form-label">Usuario</label> <br/>
            <input id="username" class="form-control" type="text" name="usuario" value="">
          </div>
          <div class="col-lg-12 col-md-12">
            <label class="form-label" for="">Contraseña</label> <br/>
            <input id="password" class="form-control" type="password" name="password" value="">
          </div>
          <div class="col-lg-12 col-md-12">
            <button type="button" onclick="sendata()" class="btn btn-success">Login</button>
          </div>
        </form>
      </div>
    </div> -->

  <script type="text/javascript">
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

    function sendata() {
      var urlx = 'http://' + window.location.hostname + '/';
      var username = document.getElementById('username').value;
      var passs = document.getElementById("password").value;
      let formData = new FormData;
      formData.append("usuario", username);
      formData.append("password", passs);

      var response = setAjaxNative(urlx + "agenda/login.php", 'POST', formData, responsedatax);
    }
    //ENVIANDO A RECUPERAR
    function sendata2() {
      var urlx = 'http://' + window.location.hostname + '/';
      var username = document.getElementById('recup').value;
      console.log(username);
      let formData = new FormData;
      formData.append("usuario", username);
      var response = setAjaxNative(urlx + "agenda/recuperarCorreo.php", 'POST', formData, responsedatax);
    }
    //REGISTRAR USUARIO
    function sendata3() {
      var urlx = 'http://' + window.location.hostname + '/';
      var imagen = $('#imagen').prop('files')[0];
      let formData = new FormData;
      formData.append("imagen", imagen);
      var response = setAjaxNative(urlx + "agenda/insertar.php", 'POST', formData, responsedatax);
    }
    function responsedatax(jsonx) {
      if (jsonx['status'] == 200) {
        window.location.href = "view.php";
      }else if (jsonx['status'] == 203) {
        console.log(jsonx['mensaje']);
      }else {
        alert("Datos incorrectos");
        console.log(jsonx['mensaje']);
      }
    }
  </script>
</body>

</html>