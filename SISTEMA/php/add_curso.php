<?php
require('../connect.php');

if(isset($_POST['enviar'])){
    $nombre=trim($_POST['nombre']);



    if($nombre==''){
        ?>
             <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show " role="alert">
                rellena los campos
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        <?php
    }else{
        $id_curso=genera_codigo(10);
        //validar alumnos id
        $consult="SELECT*FROM CURSO WHERE ID_CURSO='$id_curso'";
        $res=mysqli_query($con,$consult);

        $numf=mysqli_num_rows($res);
        
        while($numf>0){
            $id_curso=genera_codigo(10);
            //validar si repite o no el id
            $consult="SELECT*FROM CURSO WHERE ID_CURSO='$id_curso'";
            $res=mysqli_query($con,$consult);
            $numf=mysqli_num_rows($res);
        }

        $consult2="INSERT INTO CURSO(ID_CURSO,NOMBRE) VALUES('$id_curso','$nombre')";
        $insert2=mysqli_query($con,$consult2);

        if($consult2){
            ?>
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    
                    Curso agregado correctamente
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