<?php 
    require('../connect.php');

    //obtener id del alumno
    $cons="SELECT ID_ALUMNO FROM ALUMNO WHERE ID_USER='$id_user'";
    $resalu=mysqli_query($con,$cons);
    $dato=mysqli_fetch_array($resalu);
    $id_alu=$dato['ID_ALUMNO'];
    //obtener cursos en los que esta matriculado el alumno

    $res=mysqli_query($con,"SELECT ID_CLASS,ID_ALUMNO,CLASE.ID_SALON,SALON.ID_CURSO,CURSO.NOMBRE AS NOM_C,SALON.ID_PROFE,PROFESOR.ID_USER,USUARIO.NOMBRE,USUARIO.APELLIDO FROM CLASE INNER JOIN SALON ON CLASE.ID_SALON=SALON.ID_SALON INNER JOIN CURSO ON SALON.ID_CURSO=CURSO.ID_CURSO INNER JOIN PROFESOR ON SALON.ID_PROFE=PROFESOR.ID_PROFE INNER JOIN USUARIO ON PROFESOR.ID_USER=USUARIO.ID_USER WHERE CLASE.ID_ALUMNO='$id_alu'");

    $i=1;
?>

                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">curso</th>
                      <th scope="col">Profesor</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php while($dato=mysqli_fetch_array($res)){ ?>
                        <tr>
                            <th scope="row"><?php echo $i;?></th>
                            <td><?php echo $dato['NOM_C'] ?></td>
                            <td><?php echo $dato['NOMBRE']." ".$dato['APELLIDO'];?></td>
                        </tr>
                        <?php $i++; }?>
                  </tbody>
                </table>