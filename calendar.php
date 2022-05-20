 
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
        <h2>Apuntate aquí los días que puedes quedar:</h2>
        <a href="plaza.php">Plaza</a>
        <a href="eventos.php">Eventos</a>
        <a href="cierre_sesion.php">Cerrar sesion</a>  
        
    </div>

  <script>
   
  $(document).ready(function() {
    
   var calendar = $('#calendar').fullCalendar({
    locale: 'es',
    editable:true,
    
    header:{
     left:'',
     center:'title',
     right:'today, prev,next'

    },

    events: 'load_calendar.php',
    selectable:true,
    selectHelper:true,

    select: function(start, event)
    {
     
      var title = prompt("Introduce tu nombre");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
      
      $.ajax({
       url:"insert_calendar.php",
       type:"POST",
       data:{title:title,start:start},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
       }
      })
    }
    },
    editable:true,

    
   });

   calendar.render();
  });
   
  </script>
 </head>
 <body>
 
  <div class="container">
   <div id="calendar"></div>
  </div>
 
 </body>
</html>
