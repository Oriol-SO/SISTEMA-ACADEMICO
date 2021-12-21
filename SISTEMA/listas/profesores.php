<?php 
require('../connect.php');

$consult="SELECT PROFESOR.ID_USER,ID_PROFE,USUARIO.NOMBRE,USUARIO.APELLIDO FROM USUARIO INNER JOIN PROFESOR ON USUARIO.ID_USER=PROFESOR.ID_USER";
$res=mysqli_query($con,$consult);

while($dato=mysqli_fetch_array($res)){
    ?>
     <option value="<?php echo $dato['ID_PROFE'];?>"> <?php echo $dato['NOMBRE']." ".$dato['APELLIDO']; ?></option>
    <?php
}

?>