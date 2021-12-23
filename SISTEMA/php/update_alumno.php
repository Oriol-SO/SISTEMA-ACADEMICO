<?php 
require('../../connect.php');


if(!empty($_POST)){

    if($_POST['action']== 'infouser'){
        
        $id_user=trim($_POST['user']);
        $id_alu=trim($_POST['alu']);

        $res=mysqli_query($con,"SELECT USUARIO.ID_USER,ID_ALUMNO,NOMBRE,APELLIDO,DNI,GRADO,SECCION,PASSWORD FROM USUARIO  INNER JOIN ALUMNO ON USUARIO.ID_USER=ALUMNO.ID_USER WHERE USUARIO.ID_USER='$id_user' AND ALUMNO.ID_ALUMNO='$id_alu'" );
        $fila=mysqli_num_rows($res);
        if($fila > 0){
            $dato=mysqli_fetch_assoc($res);
            echo json_encode($dato,JSON_UNESCAPED_UNICODE);
            exit;
        }else{
            echo "error";
        }

    }
    
    if($_POST['action']=='editAlu') {
        $nombre=trim($_POST['nombre']);
        $apell=trim($_POST['apellido']);
        $dni=trim($_POST['dni']);
        $pass=trim($_POST['pass']);
        $grad=trim($_POST['grado']);
        $sec=trim($_POST['sec']);

        $id_user=trim($_POST['us']);
        $id_alu=trim($_POST['alu']);

        if($nombre=='' || $apell=='' || $dni=='' || $pass=='' || $grad=='' || $sec==''){
            echo "blank";
        }else{

            $consult="UPDATE USUARIO SET NOMBRE='$nombre',APELLIDO='$apell',DNI='$dni',PASSWORD='$pass' WHERE ID_USER='$id_user'";
            $insert=mysqli_query($con,$consult);

            $consulta2="UPDATE AlUMNO SET GRADO='$grad', SECCION='$sec' WHERE ID_ALUMNO='$id_alu'";
            $insert2=mysqli_query($con,$consulta2);

            if($insert && $insert2){
                echo "update";
                        
            }
        }    
    }  


}

?>
