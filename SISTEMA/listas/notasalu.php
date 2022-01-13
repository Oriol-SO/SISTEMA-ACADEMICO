<?php 

//ALUMNO ID 
$cons="SELECT ID_ALUMNO FROM ALUMNO WHERE ID_USER='$id_user'";
$resalu=mysqli_query($con,$cons);
$dato=mysqli_fetch_array($resalu);
$id_alu=$dato['ID_ALUMNO'];

$consult1="SELECT CLASE.ID_CLASS,CLASE.ID_SALON,CLASE.ID_ALUMNO,SALON.ID_CURSO,CURSO.NOMBRE,PROMEDIO FROM CLASE INNER JOIN SALON ON CLASE.ID_SALON=SALON.ID_SALON INNER JOIN CURSO ON SALON.ID_CURSO=CURSO.ID_CURSO WHERE CLASE.ID_ALUMNO='$id_alu'";
$res=mysqli_query($con,$consult1);  

function consult_nota($id_class,$trim,$uni){
    $consult="SELECT NOTA FROM CALIFICACION WHERE ID_CLASS='$id_class' AND TRIMESTRE='$trim' AND UNIDAD='$uni'";
    return $consult;
  }

  function promedio($id_class,$trim){
   $consult="SELECT ID_CLASS,TRIMESTRE,AVG(NOTA) FROM CALIFICACION WHERE ID_CLASS='$id_class' AND TRIMESTRE='$trim'";
   return $consult;
  }

?>
           <style>
               #ctext{
                   text-align:center;
                   vertical-align:middle;
               }
           </style>
    <table class="table table-bordered">
             <thead>
                  <tr>
                    <Th rowspan="2">#</Th>
                    <th rowspan="2">Curso</th>
                    <th scope="col"colspan="4" id="ctext" >1T</th>
                    <th scope="col"colspan="4" id="ctext">2T</th>
                    <th scope="col"colspan="4" id="ctext">3T</th>
                    <th rowspan="2" id="ctext">final</th>
                  </tr>
                  <tr>
                    <th scope="col"id="ctext">u1</th>
                    <th scope="col"id="ctext">u2</th>
                    <th scope="col"id="ctext">u3</th>
                    <th scope="col"id="ctext">P</th>
                    <th scope="col"id="ctext">u1</th>
                    <th scope="col"id="ctext">u2</th>
                    <th scope="col"id="ctext">u3</th>
                    <th scope="col"id="ctext">P</th>
                    <th scope="col"id="ctext">u1</th>
                    <th scope="col"id="ctext">u2</th>
                    <th scope="col"id="ctext">u3</th>
                    <th scope="col"id="ctext">P</th>
                  </tr>
                 
                </thead>
        <tbody>
            <?php  
            $j=1;
            while($dato=mysqli_fetch_array($res)){
            ?>
        <tr>
            <th scope="row"><?php echo $j;?></th>
            <td><?php echo $dato['NOMBRE']; ?></td>
            
                    <?php $clas=$dato['ID_CLASS'];?>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,1)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,2)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,3)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                            <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,1))); ?>
                            <td <?php if($dprom['AVG(NOTA)']>11){echo"style='background:green;'";}?>><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,1)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,2)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,3)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                             <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,2))); ?>
                            <td><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,1)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,2)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,3)));?>
                    <td ><?php echo $dnota['NOTA'];?> <?php  ?></td>

                            <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,3))); ?>
                            <td><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <td><?php echo $dato['PROMEDIO']; ?></td>
            
        </tr>
        <?php $j++;} ?>
        </tbody>
</table>

