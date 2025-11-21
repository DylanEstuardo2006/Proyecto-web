<?php   
   session_start();

   if($_SESSION['verificarAdministrador'] == 1)
   {
     header("Location: mapaDeSitioAdministador.php");
     exit();
   }
   else if($_SESSION['verificarAdministrador'] == 2)
   {
       header("Location: mapaDeSitioTecnico.php");
       exit();
   }   
   else
   {
       header("Location: ../login.php");
       exit();
   }
?>