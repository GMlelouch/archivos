<?php 
  
  session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="materialize/js/jquery-3.3.1.min.js"></script>
  
  <script type="text/javascript" src="materialize/js/config.js"></script>
  <script type="text/javascript" src="materialize/js/menu.js"></script>
  <script type="text/javascript" src="materialize/js/datatables.min.js"></script>
  <script type="text/javascript" src="materialize/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="materialize/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>

  <link rel="stylesheet" type="text/css" href="materialize/css/materialize.css">
  <link rel="stylesheet" type="text/css" href="materialize/css/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="materialize/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="materialize/css/responsive.dataTables.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="materialize/css/style.css">
</head>
<body style="background-image: url('materialize/img/chilca.jpg'); background-size: cover;">


<?php 
    if (isset($_SESSION['usuario'])) {
        include("vista/navbar.php");
          if (isset($_GET['pagina'])) {
        if ($_GET['pagina'] == "home") {
             include("vista/menu.php");
          }
        elseif ($_GET['pagina'] == "actaArchivo") {
           include("vista/acta_archivo.php");
         }
         elseif ($_GET['pagina'] == "actaMatrimonial") {
           include("vista/acta_archivo.php");
         }
         elseif ($_GET['pagina'] == "actaDefuncion") {
           include("vista/acta_archivo.php");
         }
         elseif ($_GET['pagina'] == "salir") {
           include("controlador/salir.php");
         }
         else{
          include("vista/menu.php");
      }
    }
    else{
      include("vista/menu.php");
    }
    
    }
    else{
      include("vista/login.php");
    }

 ?>



</body>
</html>