<?php
  session_start();
   
 // Destruir todas las variables de sesión.
  $_SESSION = array();    
 
  // Elimina la sesion.
  session_destroy();
   
  // Redirecciona a la página de login.
 header("HTTP/1.1 302 Moved Temporarily");
 header("Location: ../index.php");


?>