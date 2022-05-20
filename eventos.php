<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <link rel="stylesheet" href="css/headerCalendar.css"/>
  <link rel="icon" href="imagenes/logo.jpg" type="image/jpg" sizes="192x192" />
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/es.js"></script>
  

  <div class="headerCalendar">
      
        <img class="logo" src="imagenes/logo.jpg" alt="logo BGMP">
        <h1>BOARD GAME MEETING POINT</h1> 
        <h2>Registra un evento o apúntate a uno:</h2>
        <a href="plaza.php">Plaza</a>
        <a href="calendar.php">Calendario</a>
        <a href="cierre_sesion.php">Cerrar sesion</a>  
        
    </div>

  <script>
   
  $(document).ready(function() {
    
   var calendar = $('#calendar').fullCalendar({
    locale: 'es',
    editable:true,
    
    header:{
     left:'title',
     center:'addEventButton, addUpdateButton',
     right:'today, prev,next'

    },

    events: 'load_eventos.php',
    selectable:true,
    selectHelper:true,

    customButtons: {
      addEventButton: {
        text: 'Nuevo evento',
        click: function() {
          $("#ModalCrearEvento").modal();
          
        }
        
      },
      addUpdateButton: {
        text: '¡Apuntame!',
        click: function() {
          $("#ModalApuntarEvento").modal();
          
        }
        
      },

    },

    eventClick:function(event) {
      $("#ModalMostrarEvento").modal();
      $("#tituloEvento").html(event.title);
      $("#organizadorEvento").html(event.creador);
      $("#asistente1").html(event.asistente1);
      $("#asistente2").html(event.asistente2);
      $("#asistente3").html(event.asistente3);
      $("#asistente4").html(event.asistente4);
     
    },
   
   });

   calendar.render();
  });

  </script>
 </head>

 
 <body>
 
  <div class="container">
   <div id="calendar"></div>
  </div>
 
<!-- MODAL PARA INSERTAR UN NUEVO EVENTO -->

 <div class="modal fade" id="ModalCrearEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registra tus eventos:</h5> 
      </div>
      <div class="modal-body">
      <?php  
      $conexion=mysqli_connect("localhost","root","","usuarios");
      session_start();
      $_SESSION['usuario'];
      ?>
        <form class="form" method="post" action="guarda_eventos.php">
        
        <label>Titulo</label>
        <input type="text" name="title" placeholder="Titulo..." required><br>

        <label>Creador</label>
        <input type="text" name="creador" value=<?php echo $_SESSION['usuario'];?>><br>

        <label>Fecha</label>
        <input type="date" name="fecha" required><br>

      <input type="submit" class="btn btn-success" value="Registrar" required>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </form>

      </div>
      
    </div>
  </div>
</div> 

<!-- MODAL PARA MOSTRAR DATOS DEL EVENTO -->

<div class="modal fade" id="ModalMostrarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tituloEvento"></h4>
        <h5 id="organizadorEvento"></h5>
        
      </div>
      <div class="modal-body">
      <p>Asistentes:</p>
      <p id="asistente1"></p>
      <p id="asistente2"></p>
      <p id="asistente3"></p>
      <p id="asistente4"></p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 

<!-- MODAL PARA APUNTARSE AL EVENTO -->

<div class="modal fade" id="ModalApuntarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Apúntate a un evento:</h5><br>
        
      </div>
      <div class="modal-body">
      
      <form class="form" method="post" action="modificar_eventos.php">
      
      <input type="text" name="asistente" value=<?php echo $_SESSION['usuario'];?>><br>
      <label>Escribe el nombre del evento:</label><br>
      <input type="text" name="title" placeholder="Evento..." ><br>
      </div>
      <div class="modal-footer">

      <input type="submit" class="btn btn-success" value="¡Apuntame!" >
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </form>
      </div>
    </div>
  </div>
</div> 

 </body>
</html>


