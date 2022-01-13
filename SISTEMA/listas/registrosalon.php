
           <?php 
            require('../connect.php');
            //OBTENER DATOS DEL SALOS
            $res=mysqli_query($con,"SELECT ID_SALON,GRADO,SECCION,SALON.ID_CURSO,NOMBRE FROM SALON INNER JOIN CURSO ON SALON.ID_CURSO=CURSO.ID_CURSO WHERE ID_SALON='$id_salon'");

            $dato=mysqli_fetch_array($res);
            switch($dato['GRADO']){
                case'1': $g='Primer'; 
                          break;
                case'2': $g='Segundo'; 
                          break;
                case'3': $g='Tercer'; 
                          break;
                case'4': $g='Cuarto'; 
                          break;
                case'5': $g='Quinto'; 
                          break;
                
           }
           $s=$dato['SECCION'];
           $c=$dato['NOMBRE'];

           //obtener alumnos del salon
           $consult1="SELECT ID_CLASS,ID_SALON,CLASE.ID_ALUMNO,PROMEDIO,NOMBRE,APELLIDO FROM CLASE INNER JOIN ALUMNO ON CLASE.ID_ALUMNO=ALUMNO.ID_ALUMNO INNER JOIN USUARIO ON ALUMNO.ID_USER=USUARIO.ID_USER WHERE ID_SALON='$id_salon' ";
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
              <h5 class="card-title"><?php echo"$c $g grado $s "; ?></h5>
              <table class="table table-bordered border-primary" id='tableregistro'>
                <thead>
                  <tr>
                    <Th rowspan="2">#</Th>
                    <th rowspan="2">Alumno</th>
                    <th scope="col"colspan="4" id="ctext" >Trimestre 1</th>
                    <th scope="col"colspan="4" id="ctext">Trimestre 2</th>
                    <th scope="col"colspan="4" id="ctext">Trimestre 3</th>
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
                    <?php $i=1; while($dato=mysqli_fetch_array($res)){ ?>
                  <tr>
                    <?php $clas=$dato['ID_CLASS'];?>
                    <th scope="row"><?php echo $i; ?></th>
                    <td ><?php echo $dato['NOMBRE']." ".$dato['APELLIDO']; ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,1)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="11" al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,2)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="12" al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,3)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="13"al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,1))); ?>
                    <td><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,1)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="21"al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,2)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="22"al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,3)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="23"al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,2))); ?>
                    <td><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,1)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="31"al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,2)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="32"al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,3)));?>
                    <td style="width:45px; padding:0;"><input style="width:45px; border:none;" type="number" product="33"al="<?php echo $dato ['ID_CLASS'];?>" value="<?php echo $dnota['NOTA'];?>"> <?php  ?></td>

                    <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,3))); ?>
                    <td><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <td></td>
                 

                  </tr>
                  <?php $i++; } ?>

                  </tr>
                </tbody>
              </table>

              <table class="table table-bordered border-primary" id='tableregistroimp' style='display:none;'>
                <thead>
                  <tr>
                    <Th rowspan="2">#</Th>
                    <th rowspan="2">Alumno</th>
                    <th scope="col"colspan="4" id="ctext" >Trim 1</th>
                    <th scope="col"colspan="4" id="ctext">Trim 2</th>
                    <th scope="col"colspan="4" id="ctext">Trim 3</th>
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
                    <?php $i=1; 
                    $res=mysqli_query($con,$consult1);
                    while($dato=mysqli_fetch_array($res)){ ?>
                  <tr>
                    <?php $clas=$dato['ID_CLASS'];?>
                    <th scope="row"><?php echo $i; ?></th>
                    <td ><?php echo $dato['NOMBRE']." ".$dato['APELLIDO']; ?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,1)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,2)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,1,3)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,1))); ?>
                    <td><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,1)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,2)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,2,3)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,2))); ?>
                    <td><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,1)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,2)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php $dnota=mysqli_fetch_array(mysqli_query($con,consult_nota($clas,3,3)));?>
                    <td style="width:45px; padding:0;"><?php echo $dnota['NOTA'];?></td>

                    <?php  $dprom=mysqli_fetch_array(mysqli_query($con,promedio($clas,3))); ?>
                    <td><?php  echo round( $dprom['AVG(NOTA)'] )?></td>

                    <td></td>
                 

                  </tr>
                  <?php $i++; } ?>

                  </tr>
                </tbody>
              </table>
              <?php $n='REGISTRO-'. $c.'-'. $g .'-grado-'. $s ; ?>
              <button type="button" onclick=" htmlexcel('tableregistroimp','<?php echo $n;?>');" class="btn btn-success">Descargar <i class="ri-download-fill"></i> </button>
           

            
