<?php
session_start();
  if(isset($_SESSION['iduser'])){
    // echo 
  }else{
    header("Location: ingreso.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="build/js/jquery.min.js"></script>
    <script src="build/js/moment.min.js"></script>
    <link rel="stylesheet" href="build/css/fullcalendar.min.css">
    <script src="build/js/fullcalendar.min.js"></script>
    <script src="build/js/es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <title>Calendario</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-7"><div id="CalendarioWeb"></div></div>
        <div class="col"></div>
      </div>
    </div>
    <!-- BOTON -->
    <div class="container">
      <div class="row">
        <form class="" action="logout.php" method="post">
          <div class="col-lg-12 col-md-12">
            <button type="submit" class="btn btn-danger">Salir</button>
          </div>
        </form>
      </div>
    </div><!--FIN DE BOTON-->
    <script>
      $(document).ready(function(){
        $('#CalendarioWeb').fullCalendar({
          header: {
            left:'today,prev,next',
            center:'title',
            right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
          },
          dayClick:function(date,jsEvent,view){//Funcion de un click
            // alert("Valor seleccionado"+date.format());
            // alert("Vista actual "+view.name);
            // $(this).css('background-color','#00CDFF');
            $('#txtFecha-A').val(date.format());
            $('#txtFechaFin-A').val(date.format());
            $("#ModalEventos").modal();
          },
            events:'http://localhost/agenda/eventos.php',
          eventClick:function(calEvent,jsEvent,view){//Muestra los eventos almacenados en la BD

            $('#TituloEvento').html(calEvent.title);

            $('#txtId').val(calEvent.idEvento);
            $('#txtTitulo').val(calEvent.title);
            $('#txtDescripcion').val(calEvent.descripcion);
            FechaHora= calEvent.start._i.split(" ");
            $('#txtFecha').val(FechaHora[0]);
            $('#txtHora').val(FechaHora[1]);
            FechaHoraFin= calEvent.end._i.split(" ");
            $('#txtFechaFin').val(FechaHoraFin[0]);
            $('#txtHoraFin').val(FechaHoraFin[1]);
            $("#exampleModal").modal();//Llamamos al modal con ese id 
          }

        });
      });
    </script>
    <!--Modal Mostrar Datos-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloEvento">Agregar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="txtId" name="txtId"><br/>
        Titulo: <input type="text" id="txtTitulo" ><br/>
        Fecha Inicio: <input type="text" id="txtFecha" name="txtFecha"><br/>
        Hora inicio: <input type="text" id="txtHora" value="12:00"><br/>
        Fecha Fin: <input type="text" id="txtFechaFin" name="txtFechaFin"><br/>
        Hora Fin: <input type="text" id="txtHoraFin" value="14:30"><br/>
        Descripcion: <textarea id="txtDescripcion" row="3"></textarea><br/>
      </div>
      <div class="modal-footer">
        <button type="button" id="modificar" class="btn btn-success" >Modificar</button>
        <button type="button" id="eliminar" class="btn btn-danger" >Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
    <!--Modal Añadir elementos-->
    <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloEvento">Agregar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="txtId-A" name="txtId">
        Titulo: <input type="text" id="txtTitulo-A" ><br/>
        Fecha Inicio: <input type="text" id="txtFecha-A" name="txtFecha"><br/>
        Hora inicio: <input type="text" id="txtHora-A" value="12:00"><br/>
        Fecha Fin: <input type="text" id="txtFechaFin-A" name="txtFechaFin"><br/>
        Hora Fin: <input type="text" id="txtHoraFin-A" value="14:30"><br/>
        Descripcion: <textarea id="txtDescripcion-A" row="3"></textarea><br/>
      </div>
      <div class="modal-footer">
        <button type="button" id="insertar" class="btn btn-success" >Agregar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- Agregando funciones -->
<script>
      function setAjaxNative(urlx_ajax, methodx, params, callBck) {
    var hr = new XMLHttpRequest();
    hr.open(methodx, urlx_ajax, true);
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var returnval = JSON.parse(hr.responseText);
            callBck(returnval);
        }
      }
      hr.send(params);
    }
    function responsedatax(jsonx){
        if(jsonx['status']== 200){
          alert (jsonx['mensaje']);
        }else{
          alert("Datos incorrectos");
        }
      }

      let formData;
  $('#insertar').click(function(){//CREATE
    formData = new FormData;
    RecolectarDatos('Insertar');
    var urlx = 'http://'+window.location.hostname+'/';
    var response = setAjaxNative(urlx + "agenda/crud.php", 'POST',formData,responsedatax);
    $('#CalendarioWeb').fullCalendar('refetchEvents');
    limpiarDatos();
    $("#ModalEventos").modal('toggle');
  });

  $('#modificar').click(function(){//MODIFICAR
    formData = new FormData;
    RecolectarDatosC('Modificar');
    var urlx = 'http://'+window.location.hostname+'/';
    var response = setAjaxNative(urlx + "agenda/crud.php", 'POST',formData,responsedatax);
    $('#CalendarioWeb').fullCalendar('refetchEvents');
    $("#exampleModal").modal('toggle');
  });

  $('#eliminar').click(function(){//ELIMINAR
    formData = new FormData;
    RecolectarDatosC('Eliminar');
    var urlx = 'http://'+window.location.hostname+'/';
    var response = setAjaxNative(urlx + "agenda/crud.php", 'POST',formData,responsedatax);
    $('#CalendarioWeb').fullCalendar('refetchEvents');
    $("#exampleModal").modal('toggle');
  });

  function RecolectarDatos(decisi){
    formData.append("accion",decisi);
    formData.append("idEvento",$('#txtId-A').val());
    formData.append("title",$('#txtTitulo-A').val());
    formData.append("start",$('#txtFecha-A').val()+" "+$('#txtHora-A').val());
    formData.append("end",$('#txtFechaFin-A').val()+" "+$('#txtHoraFin-A').val());
    formData.append("descripcion",$('#txtDescripcion-A').val());
  }
  function RecolectarDatosC(decisi){
    formData.append("accion",decisi);
    formData.append("idEvento",$('#txtId').val());
    formData.append("title",$('#txtTitulo').val());
    formData.append("start",$('#txtFecha').val()+" "+$('#txtHora').val());
    formData.append("end",$('#txtFechaFin').val()+" "+$('#txtHoraFin').val());
    formData.append("descripcion",$('#txtDescripcion').val());
  }
  function limpiarDatos(){
    $('#txtId-A').val("");
    $('#txtTitulo-A').val("");
    $('#txtDescripcion-A').val("");
  }
</script>
  </body>
</html>
