<?php 
require("connect.php");
 if(isset($_POST['validar'])){

    if(strlen($_POST['user'])>0 && strlen($_POST['password'])>0){
        session_start();
        $dni=trim($_POST['user']);
        $pass=trim($_POST['password']);
        $tipo=trim($_POST['rol']);
        $consult="SELECT DNI,PASSWORD,TIPO FROM USUARIO WHERE DNI='$dni' AND PASSWORD='$pass' AND TIPO='$tipo'";
        $res=mysqli_query($con,$consult);
        $fila=mysqli_num_rows($res);
        if($fila>0){
            $_SESSION['DNI']=$dni;
            $_SESSION['PASS']=$pass;
            $_SESSION['TIPO']=$tipo;
            header("location:inicio.php");
        }else{
            ?>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'ERROR',
                text: 'los campos no coinciden',
                });
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'porfavor rellene los espacios',
            });
        </script>
        <?php
    }
 }
?>