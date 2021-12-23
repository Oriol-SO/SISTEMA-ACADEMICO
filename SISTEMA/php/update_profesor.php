<?php 
require('../../connect.php');


if(!empty($_POST)){

    if($_POST['action']== 'infouser'){
        
        $id_user=trim($_POST['user']);
        $id_prof=trim($_POST['pro']);

        $res=mysqli_query($con,"SELECT USUARIO.ID_USER,ID_PROFE,NOMBRE,APELLIDO,DNI,PASSWORD FROM USUARIO  INNER JOIN PROFESOR ON USUARIO.ID_USER=PROFESOR.ID_USER WHERE USUARIO.ID_USER='$id_user' AND PROFESOR.ID_PROFE='$id_prof'" );
        $fila=mysqli_num_rows($res);
        if($fila > 0){
            $dato=mysqli_fetch_assoc($res);
            echo json_encode($dato,JSON_UNESCAPED_UNICODE);
            exit;
        }else{
            echo "error";
        }

    }
    
    if($_POST['action']=='editProf') {
        $nombre=trim($_POST['nombre']);
        $apell=trim($_POST['apellido']);
        $dni=trim($_POST['dni']);
        $pass=trim($_POST['pass']);

        $id_user=trim($_POST['us']);
        $id_alu=trim($_POST['prof']);

        if($nombre=='' || $apell=='' || $dni=='' || $pass=='' ){
            echo "blank";
        }else{

            $consult="UPDATE USUARIO SET NOMBRE='$nombre',APELLIDO='$apell',DNI='$dni',PASSWORD='$pass' WHERE ID_USER='$id_user'";
            $insert=mysqli_query($con,$consult);


            if($insert){
                echo "update";                      
            }
        }    
    }  


}

?>
