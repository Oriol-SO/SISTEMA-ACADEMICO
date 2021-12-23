<?php
//primer grado
function obtener_alu($grado){
    require('../connect.php');
    $consult1="SELECT USUARIO.ID_USER,ID_ALUMNO,NOMBRE,APELLIDO,DNI,SECCION,NACI,TELE,DIRECCION,GRADO,PASSWORD FROM USUARIO INNER JOIN ALUMNO ON USUARIO.ID_USER=ALUMNO.ID_USER WHERE ALUMNO.GRADO='$grado'";
     
    return $consult1;
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
              <table class="table datatable" id="tableAlumnosGrado">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Sección</th>
                    <th scope="col">Nacimiento</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Dirección</th>
                  </tr>
                </thead>
                <tbody id="tbodytablesalumnog">
                    <?php  
                    $j=1;
                    $res=mysqli_query($con,obtener_alu($i));                      
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
                    
                    <td style="padding:5px;  width:30px; height:30px;" > <a href="#" ><button type="button" class="btn btn-success btn-sm edit-user-alu" product1="<?php echo $dato['ID_USER']; ?> " product2="<?php echo $dato['ID_ALUMNO']; ?>" > <i class="ri-edit-box-fill"></i></button></a> </td>
                    <td style="padding:5px;  width:30px; height:30px;"> <a href="php/delalumno.php?id_us=<?php echo $dato['ID_USER']."&id_alu=".$dato['ID_ALUMNO']; ?>"><button type="button" class="btn btn-danger btn-sm"   > <i class="ri-delete-bin-fill"></i></button> </a> </td>
                    

                  </tr>
                  <?php $j++;} ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
 
            </div>
    </div>
           
    <div class="modal fade" id="verticalycentered" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Editar datos del alumno</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">                          
                              <div class="card">
                                <div class="card-body">
                                  
                                    <h5 class="card-title">Estudiante</h5>
                                  <!-- Vertical Form -->
                                  <form class="row g-3" id="Form-edit-alu" method="post" onsubmit="event.preventDefault(); sendDataAlu();">
                                    <div class="col-12">
                                      <label for="inputNanme4" class="form-label">Nombres</label>
                                      <input type="text" class="form-control  nombreA" id="inputNanme4"  name="nombre">
                                    </div>
                                    <div class="col-12">
                                      <label for="inpuLastName4" class="form-label">Apellidos</label>
                                      <input type="text" class="form-control apellidoA" id="inpuLastName4"  name="apellido">
                                    </div>
                                    <div class="col-12">
                                      <label for="inputDni4" class="form-label">DNI</label>
                                      <input type="text" class="form-control dniA" id="inputDni4"  name="dni">
                                    </div>
                                    <div class="col-12">
                                      <label for="inputPassword4" class="form-label">Contraseña</label>
                                      <input type="password" class="form-control passA" id="inputPassword4"  name="pass">
                                    </div>

                                    <div class="col-12" style="display:flex;">
                                        <div class="col-md-4">
                                        <label for="floatingSelect">Grado</label>
                                          <select class="form-select gradoA" id="floatingSelect" aria-label="State"  name="grado">
                                            <option value="1" >Primer</option>
                                            <option value="2">Segundo</option>
                                            <option value="3">Tercero</option>
                                            <option value="4">Cuarto</option>
                                            <option value="5">Quinto</option>
                                          </select>
                                        
                                        </div>                                                                              
                                        <div class="col-md-6" style="margin-left:10px;">
                                          <div class="col-md-12">
                                              <label for="floatingCity">Sección</label>
                                              <input type="text" class="form-control secA" id="floatingCity"  name="sec">
                                              <input type="hidden" name="us" class="userA" >
                                              <input type="hidden" name="alu"class="aluA" > 
                                              <input type="hidden" name="action" value="editAlu" >                                           
                                          </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelarupdatealu">Cancelar</button>
                                      <button type="submit" class="btn btn-primary" name="enviar">Guardar Cambios</button>
                                    </div>
                                  </form><!-- Vertical Form -->
                                   
                                  <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" id="rellenacampostabs" role="alert" class="btn btn-success btn-sm " style="display:none;">
                                     rellena los campos
                                    
                                  </div>
                                  <?php // include('php/update_alumno.php'); ?>
                                </div>
                              </div>
                          </div>
                         
                        </div>
                      </div>
                    </div>
                  
<?php }
?>


