<?php   
   session_start();

   if($_SESSION['verificarAdministrador'] == 1)
   {
     header("Location: menuAdministrador.php");
     exit();
   }
   else if($_SESSION['verificarAdministrador'] == 2)
   {
       header("Location: menuTecnico.php");
       exit();
   }   
   else
   {
       header("Location: ../login.php");
       exit();
   }
?>