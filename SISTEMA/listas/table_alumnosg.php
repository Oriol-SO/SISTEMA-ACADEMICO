<?php
//primer grado

function obtener_alu($grado){
    require('../connect.php');
    $consult1="SELECT USUARIO.ID_USER,ID_ALUMNO,NOMBRE,APELLIDO,DNI,SECCION,NACI,TELE,DIRECCION,GRADO FROM USUARIO INNER JOIN ALUMNO ON USUARIO.ID_USER=ALUMNO.ID_USER WHERE ALUMNO.GRADO='$grado'";
    $res=mysqli_query($con,$consult1);    
    return $res;
}

function obtener_gra($grado){
    switch ($grado){
        case 1: $res='Primer'; break;
        case 2: $res='Segundo'; break;
        case 3: $res='Tercer'; break;
        case 4: $res='Cuarto'; break;
        case 5: $res='Quinto'; break;
    }
    return $res;
}

for($i=1; $i<=5 ;$i++){
?> 
<div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo obtener_gra($i);?> Grado</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">SECCION</th>
                    <th scope="col">NACIMIENTO</th>
                    <th scope="col">TELEFONO</th>
                    <th scope="col">DIRECCION</th>
                  </tr>
                </thead>
                <tbody>
                    <?php  
                    $j=1;
                    $res=obtener_alu($i);
                    while($dato=mysqli_fetch_array($res)){
                    ?>
                  <tr>
                    <th scope="row"><?php echo $j;?></th>
                    <td><?php echo $dato['NOMBRE']; ?></td>
                    <td><?php echo $dato['APELLIDO']; ?></td>
                    <td><?php echo $dato['DNI']; ?></td>
                    <td><?php echo $dato['SECCION']; ?></td>
                    <td><?php echo $dato['NACI']; ?></td>
                    <td><?php echo $dato['TELE']; ?></td>
                    <td><?php echo $dato['DIRECCION']; ?></td>
                    
                  </tr>
                  <?php $j++;} ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
    </div>
           

<?php }
?>