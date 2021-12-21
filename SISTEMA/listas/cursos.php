<?php 
require('../connect.php');

$consult="SELECT ID_CURSO,NOMBRE FROM CURSO";
$res=mysqli_query($con,$consult);

while($dato=mysqli_fetch_array($res)){
    ?>
     <option value="<?php echo $dato['ID_CURSO'];?>"> <?php echo $dato['NOMBRE']; ?></option>
    <?php
}

?>