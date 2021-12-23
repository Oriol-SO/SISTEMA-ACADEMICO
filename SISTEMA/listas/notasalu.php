<?php 

//ALUMNO ID 
$cons="SELECT ID_ALUMNO FROM ALUMNO WHERE ID_USER='$id_user'";
$resalu=mysqli_query($con,$cons);
$dato=mysqli_fetch_array($resalu);
$id_alu=$dato['ID_ALUMNO'];

$consult1="SELECT CLASE.ID_SALON,CLASE.ID_ALUMNO,SALON.ID_CURSO,CURSO.NOMBRE,PROMEDIO FROM CLASE INNER JOIN SALON ON CLASE.ID_SALON=SALON.ID_SALON INNER JOIN CURSO ON SALON.ID_CURSO=CURSO.ID_CURSO WHERE CLASE.ID_ALUMNO='$id_alu'";
$res=mysqli_query($con,$consult1);  
?>
    <table class="table table-bordered">
        <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Curso</th>
                <th scope="col">nota 1</th>
                <th scope="col">nota 2</th>
                <th scope="col">nota 3</th>
                <th scope="col">Promedio</th>
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
            <td><?php echo "-"; ?></td>
            <td><?php echo "-"; ?></td>
            <td><?php echo "-"; ?></td>
            <td><?php echo $dato['PROMEDIO']; ?></td>
            
        </tr>
        <?php $j++;} ?>
        </tbody>
</table>

