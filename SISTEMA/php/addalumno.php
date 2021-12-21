<?php 
require('../connect.php');

if(isset($_POST['enviar'])){
    $nombre=trim($_POST['nombre']);
    $apell=trim($_POST['apellido']);
    $dni=trim($_POST['dni']);
    $pass=trim($_POST['pass']);
    $grad=trim($_POST['grado']);
    $sec=trim($_POST['secc']);

    $tipo="alu";

    if($nombre=='' || $apell=='' || $dni=='' || $pass=='' || $grad=='' || $sec==''){
        ?>
             <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                rellena los campos
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php
    }else{  

        $id_use=genera_codigo(10);
        //validar id_user 
        $consult="SELECT*FROM USUARIO WHERE ID_USER='$id_use'";
        $res=mysqli_query($con,$consult);

        $numf=mysqli_num_rows($res);
        
        while($numf>0){
            $id_use=genera_codigo(10);
            //validar si repite o no el id
            $consult="SELECT*FROM USUARIO WHERE ID_USER='$id_use'";
            $res=mysqli_query($con,$consult);
            $numf=mysqli_num_rows($res);
        }

        $id_alu=genera_codigo(10);

        //validar alumnos id
        $consult="SELECT*FROM ALUMNO WHERE ID_USER='$id_alu'";
        $res=mysqli_query($con,$consult);

        $numf=mysqli_num_rows($res);
        
        while($numf>0){
            $id_alu=genera_codigo(10);
            //validar si repite o no el id
            $consult="SELECT*FROM ALUMNO WHERE ID_ALUMNO='$id_alu'";
            $res=mysqli_query($con,$consult);
            $numf=mysqli_num_rows($res);
        }

        //inserta en la base de datos 

        $consult="INSERT INTO USUARIO(ID_USER,NOMBRE,APELLIDO,DNI,PASSWORD,TIPO) VALUES('$id_use','$nombre','$apell','$dni','$pass','$tipo')";
        $insert=mysqli_query($con,$consult);

        $consult2="INSERT INTO ALUMNO(ID_USER,ID_ALUMNO,GRADO,SECCION) VALUES('$id_use','$id_alu','$grad','$sec')";
        $insert2=mysqli_query($con,$consult2);
        
        if($consult && $consult2){
            ?>
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    alumno agregado correctamente
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