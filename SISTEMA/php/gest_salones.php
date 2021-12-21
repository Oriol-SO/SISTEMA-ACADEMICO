<?php 
require('../connect.php');

if(isset($_POST['enviar'])){
    $id_curso=trim($_POST['curso']);
    $grado=trim($_POST['grado']);
    $sec=trim($_POST['secc']);
    $id_profe=trim($_POST['profe']);

    

    if($id_curso=='' || $grado=='' || $sec=='' || $id_profe==''){
        ?>
             <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show " role="alert">
                rellena los campos
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php
    }else{  

        $id_salon=genera_codigo(10);
        //validar id_user 
        $consult="SELECT*FROM SALON WHERE ID_SALON='$id_salon'";
        $res=mysqli_query($con,$consult);

        $numf=mysqli_num_rows($res);
        
        while($numf>0){
            $id_salon=genera_codigo(10);
            //validar si repite o no el id
            $consult="SELECT*FROM SALON WHERE ID_SALON='$id_salon'";
            $res=mysqli_query($con,$consult);
            $numf=mysqli_num_rows($res);
        }


        //inserta en la base de datos 

        $consult="INSERT INTO SALON(ID_SALON,GRADO,ID_CURSO,ID_PROFE,SECCION) VALUES('$id_salon','$grado','$id_curso','$id_profe','$sec')";
        $insert=mysqli_query($con,$consult);

     
        
        if($consult){
            ?>
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    Se creo el salon correctamente
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
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