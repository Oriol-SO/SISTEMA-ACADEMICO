<?php 
$consult1="SELECT USUARIO.ID_USER,ID_ADMI,NOMBRE,APELLIDO,DNI,TELE,DIRECCION FROM USUARIO INNER JOIN ADMINISTRADOR ON USUARIO.ID_USER=ADMINISTRADOR.ID_USER";
$res=mysqli_query($con,$consult1);  
?>
<table class="table datatable">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellido</th>
    <th scope="col">DNI</th>
    <th scope="col">TELEFONO</th>
    <th scope="col">DIRECCION</th>
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
    <td><?php echo $dato['APELLIDO']; ?></td>
    <td><?php echo $dato['DNI']; ?></td>
    <td><?php echo $dato['TELE']; ?></td>
    <td><?php echo $dato['DIRECCION']; ?></td>
    
  </tr>
  <?php $j++;} ?>
</tbody>
</table>

