
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

           $res=mysqli_query($con,"SELECT ID_CLASS,ID_SALON,CLASE.ID_ALUMNO,PROMEDIO,NOMBRE,APELLIDO FROM CLASE INNER JOIN ALUMNO ON CLASE.ID_ALUMNO=ALUMNO.ID_ALUMNO INNER JOIN USUARIO ON ALUMNO.ID_USER=USUARIO.ID_USER WHERE ID_SALON='$id_salon' ");
           
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
              <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <Th rowspan="2">#</Th>
                    <th rowspan="2">Nombre</th>
                    <th rowspan="2">Apellido</th>
                    <th rowspan="2" id="ctext"></th>
                  </tr>
                 
                </thead>
                <tbody>
                    <?php $i=1; while($dato=mysqli_fetch_array($res)){ ?>
                  <tr>
                    <?php $clas=$dato['ID_CLASS'];?>
                    <th scope="row"><?php echo $i; ?></th>
                    <td ><?php echo $dato['NOMBRE']; ?></td>
                    <td ><?php echo $dato['APELLIDO']; ?></td>
                    <td></td>                 

                  </tr>
                  <?php $i++; } ?>

                  </tr>
                </tbody>
              </table>

            
