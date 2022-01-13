<?php 
require('../../connect.php');


if(!empty($_POST)){

    if($_POST['action']== 'upnot'){
        $id_class=trim($_POST['ida']);
        $trim= substr(trim($_POST['tu']), 0, 1);
        $unid= substr(trim($_POST['tu']), 1, 2);
        $nota=trim($_POST['dato']);
// verificamos i ya ahya una insercion en este campo o aun no

        $res=mysqli_query($con,"SELECT ID_CALIFICACION FROM CALIFICACION WHERE ID_CLASS='$id_class' AND TRIMESTRE='$trim' AND UNIDAD='$unid'");
        $dato=mysqli_fetch_array($res);
        $numrows=mysqli_num_rows($res);
        if($numrows>0){
            $id_cali=$dato['ID_CALIFICACION'];
            //actualización
            $res=mysqli_query($con,"UPDATE CALIFICACION SET NOTA='$nota'  WHERE ID_CALIFICACION='$id_cali' AND ID_CLASS='$id_class'");
            if($res){
                echo "actualizado";
            }
        }else{
            //insertar
                //validar id_calificacion si noe nxiste enla base de dato
                $id_cali=genera_codigo(10);
                $consult="SELECT*FROM CALIFICACION WHERE ID_CALIFICACION='$id_cali'";
                $res=mysqli_query($con,$consult);
                $numf=mysqli_num_rows($res);        
                while($numf>0){
                    $id_cali=genera_codigo(10);
                    $consult="SELECT*FROM CALIFICACION WHERE ID_CALIFICACION='$id_cali'";
                    $res=mysqli_query($con,$consult);    
                    $numf=mysqli_num_rows($res);
                }
               //insertamos

               $res=mysqli_query($con,"INSERT INTO CALIFICACION (ID_CALIFICACION,ID_CLASS,TRIMESTRE,UNIDAD,NOTA) VALUES ('$id_cali','$id_class','$trim','$unid','$nota')");
               if($res){
                   echo"insertado";
               }
        }
      

    }
     
   


}

function genera_codigo ($longitud) {
    $caracteres = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    $codigo = '';

    for ($i = 1; $i <= $longitud; $i++) {
        $codigo .= $caracteres[numero_aleatorio(0, 35)];
    }

    return $codigo;
}
function numero_aleatorio ($ninicial, $nfinal) {
    $numero = rand($ninicial, $nfinal);

    return $numero;
}
?>
