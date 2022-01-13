

<?php
 require('../connect.php');

 //obtener los salones por grado y seccion
function salones($g,$s){
 $res="SELECT ID_SALON,SALON.ID_CURSO,SALON.ID_PROFE,GRADO,SECCION,CURSO.NOMBRE AS NOM_C,PROFESOR.ID_USER,USUARIO.NOMBRE,APELLIDO FROM SALON INNER JOIN CURSO ON SALON.ID_CURSO=CURSO.ID_CURSO INNER JOIN PROFESOR ON SALON.ID_PROFE=PROFESOR.ID_PROFE INNER JOIN USUARIO ON PROFESOR.ID_USER=USUARIO.ID_USER  WHERE SALON.GRADO='$g' AND SECCION='$s'";
 return $res;
}
function seccion($g){
    $consult="SELECT  DISTINCT SECCION FROM SALON WHERE GRADO='$g'";
    return $consult;
}

for($i=1; $i<=5;$i++){
    $resSec=mysqli_query($con,seccion($i));
    while($sec=mysqli_fetch_array($resSec)){
        $seccion=$sec['SECCION'];
?>
    <div class="card">
              <div class="card-body">
                <h5 class="card-title">Grado <?php echo $i; ?> Seccion <?php echo $seccion; ?></h5>
                <p>Se muestran los cursos con lso profesores en esta aula</p>
                <!-- Small tables -->
                       
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">curso</th>
                      <th scope="col">Profesor</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $resSalon=mysqli_query($con,salones($i,$seccion));
                      $j=1; 
                      while($dato=mysqli_fetch_array($resSalon)){?>
                        <tr>
                            <th scope="row"><?php echo $j;?></th>
                            <td><?php echo$dato['NOM_C']; ?></td>
                            <td><?php echo$dato['NOMBRE']." ".$dato['APELLIDO']; ?></td>
                        </tr>
                        <?php $j++; }?>
                    </tbody>
                </table>      

              </div>
    </div>

<?php } }?>