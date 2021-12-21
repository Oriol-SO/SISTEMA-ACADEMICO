<?php
require('../connect.php');

if(isset($_POST['enviar'])){
    $id_curso=trim($_POST['curso']);




    if($id_curso==''){
        ?>
             <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show " role="alert">
                rellena los campos
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php
    }else{
        //obtener salon a la cual pertenece

        $consult0="SELECT ID_SALON FROM SALON WHERE GRADO='$grado' AND SECCION='$sec' AND ID_CURSO='$id_curso'";
        $res0=mysqli_query($con,$consult0);
        $dato0=mysqli_fetch_array($res0);
        
        //buscamos el id del alumno        
        $cons="SELECT ID_ALUMNO FROM ALUMNO WHERE ID_USER='$id_user'";
        $resalu=mysqli_query($con,$cons);
        $dato=mysqli_fetch_array($resalu);

        //variables del salon
        $id_alu=$dato['ID_ALUMNO'];
        $id_salon=$dato0['ID_SALON'];
        $id_class=genera_codigo(10); 

        //validar ID CLASS
        $consult="SELECT*FROM CLASE WHERE ID_CLASS='$id_class'";
        $res=mysqli_query($con,$consult);
        $numf=mysqli_num_rows($res);        
        while($numf>0){
            $id_class=genera_codigo(10);
            //validar si repite o no el id
            $consult="SELECT*FROM CLASE WHERE ID_CLASS='$id_class'";
            $res=mysqli_query($con,$consult);    
            $numf=mysqli_num_rows($res);
        }

        //insertamos la matricula 

        $consult2="INSERT INTO CLASE(ID_CLASS,ID_ALUMNO,ID_SALON) VALUES('$id_class','$id_alu','$id_salon')";
        $insert2=mysqli_query($con,$consult2);

        if($insert2){
            ?>
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                  
                    Te incribite al curso correctamente
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }else{
            ?>
            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show " role="alert">
           Tenemos dificultades por favor intentalo de nuevo y si el error persiste comunicate con soporte tecnico
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
          </div><?php
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