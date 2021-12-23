<?php 
    //obtener id alumno y user
    require('../../connect.php');
    $id_us=trim($_GET['id_us']);
    $id_alu=trim($_GET['id_alu']);

    //obtener el id de la clase par aeliminar la calificación del alumno

    $res=mysqli_query($con,"SELECT ID_CLASS FROM CLASE WHERE ID_ALUMNO='$id_us'");
    $dato=mysqli_fetch_array($res);
    $id_class=$dato['ID_CLASS'];



    //empezar a borrar todas las tablas hasta llegar a usuario

    mysqli_query($con,"DELETE FROM CALIFICACION WHERE ID_CLASS='$id_class'");
    
    mysqli_query($con,"DELETE FROM CLASE WHERE ID_CLASS='$id_class'");

    mysqli_query($con,"DELETE FROM ALUMNO WHERE ID_ALUMNO='$id_alu'");

   $del=mysqli_query($con,"DELETE FROM USUARIO WHERE ID_USER='$id_us'");

    if($del){
        header('location:../tables.php');
    }


?>