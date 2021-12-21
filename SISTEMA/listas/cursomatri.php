<?php 
require('../connect.php');
//obtener grado y seccion del alumno

$consult1="SELECT GRADO,SECCION FROM ALUMNO WHERE ID_USER='$id_user'";
$res1=mysqli_query($con,$consult1);
$dato1=mysqli_fetch_array($res1);

$grado=$dato1['GRADO'];
$sec=$dato1['SECCION'];

$consult="SELECT SALON.ID_CURSO,NOMBRE FROM SALON INNER JOIN CURSO ON SALON.ID_CURSO=CURSO.ID_CURSO WHERE GRADO='$grado' AND SECCION='$sec' ";
$res=mysqli_query($con,$consult);

while($dato=mysqli_fetch_array($res)){
    ?>
     <option value="<?php echo $dato['ID_CURSO'];?>"> <?php echo $dato['NOMBRE']; ?></option>
    <?php
}

?>