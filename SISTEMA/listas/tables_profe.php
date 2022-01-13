<?php 
$consult1="SELECT USUARIO.ID_USER,ID_PROFE,NOMBRE,APELLIDO,DNI,TELE,DIRECCION FROM USUARIO INNER JOIN PROFESOR ON USUARIO.ID_USER=PROFESOR.ID_USER";
$res=mysqli_query($con,$consult1);  
?>
<table class="table datatable" id="tableprofe">
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
    
    <td style="padding:5px;  width:30px; height:30px;" > <a href="#" ><button type="button" class="btn btn-success btn-sm edit-user-prof" product1="<?php echo $dato['ID_USER']; ?> " product2="<?php echo $dato['ID_PROFE']; ?>" > <i class="ri-edit-box-fill"></i></button></a> </td>
    <td style="padding:5px;  width:30px; height:30px;"> <a href="php/delprofe.php?id_us=<?php echo $dato['ID_USER']."&id_pro=".$dato['ID_PROFE']; ?>"><button type="button" class="btn btn-danger btn-sm"   > <i class="ri-delete-bin-fill"></i></button> </a> </td>
                    
  </tr>
  <?php $j++;} ?>
</tbody>
</table>

<div class="modal fade" id="verticalycentered" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Editar datos del docente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">                          
                              <div class="card">
                                <div class="card-body">
                                  
                                    <h5 class="card-title">Profesor</h5>
                                  <!-- Vertical Form -->
                                  <form class="row g-3" id="Form-edit-prof" method="post" onsubmit="event.preventDefault(); sendDataProf();">
                                    <div class="col-12">
                                      <label for="inputNanme4" class="form-label">Nombres</label>
                                      <input type="text" class="form-control  nombreP" id="inputNanme4"  name="nombre">
                                    </div>
                                    <div class="col-12">
                                      <label for="inpuLastName4" class="form-label">Apellidos</label>
                                      <input type="text" class="form-control apellidoP" id="inpuLastName4"  name="apellido">
                                    </div>
                                    <div class="col-12">
                                      <label for="inputDni4" class="form-label">DNI</label>
                                      <input type="text" class="form-control dniP" id="inputDni4"  name="dni">
                                    </div>
                                    <div class="col-12">
                                      <label for="inputPassword4" class="form-label">Contraseña</label>
                                      <input type="password" class="form-control passP" id="inputPassword4"  name="pass">
                                      <input type="hidden" name="us" class="userP" >
                                      <input type="hidden" name="prof"class="prof" > 
                                      <input type="hidden" name="action" value="editProf" >
                                    </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelarupdatepro">Cancelar</button>
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
    

