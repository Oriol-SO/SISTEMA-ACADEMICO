<?php 
    //obtener id alumno y user
    require('../../connect.php');
    $id_us=trim($_GET['id_us']);
    $id_pro=trim($_GET['id_alu']);

    //obtener el id de la clase par aeliminar la calificación del alumno

     header('location:../tablesprof.php');
  


?>