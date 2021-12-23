<?php 
    require('../connect.php');
    //obtener id de profesor
    $res1=mysqli_query($con,"SELECT ID_PROFE FROM PROFESOR WHERE ID_USER='$id_user'");
    $dato=mysqli_fetch_array($res1);
    $id_prof=$dato['ID_PROFE'];


        $consult=("SELECT ID_SALON,ID_PROFE,SALON.ID_CURSO,GRADO,SECCION,NOMBRE FROM SALON INNER JOIN CURSO ON SALON.ID_CURSO=CURSO.ID_CURSO WHERE ID_PROFE='$id_prof'");      
  


?>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Primer Grado</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Segundo Grado</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Tercer Grado</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Cuarto Grado</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact3" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Quinto Grado</button>
                </li>
              </ul>
            
            <div class="tab-content pt-2" id="myTabContent">
            
                
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                <?php $res=mysqli_query($con,$consult); ?> 
                <?php while($dato=mysqli_fetch_array($res)){ ?>   
                    <?php if($dato['GRADO']==1){ ?>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Seccion <?php echo $dato['SECCION'];?></h3>
                            <h5>  <?php echo $dato['NOMBRE']; ?> </h5>

                            <a href="calificar.php">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollingModal">
                                Calificar
                            </button>
                            </a>
               
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                Lista de Alumnos
                            </button>                           

                        </div>
                    </div>
                    <?php } } ?>    
                </div>
           
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php $res=mysqli_query($con,$consult); ?>
                <?php while($dato=mysqli_fetch_array($res)){ ?> 
                    <?php if($dato['GRADO']==2){ ?>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Seccion <?php echo $dato['SECCION'];?></h3>
                                <h5>  <?php echo $dato['NOMBRE']; ?> </h5>

                                <a href="calificar.php">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollingModal">
                                    Calificar
                                </button>
                                </a>
                                <a href="listaAlumnos.php">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                    Lista de Alumnos
                                </button>   
                                </a>                        

                            </div>
                        </div>
                        <?php  } }?>    
                               
                
                </div>
               
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="contact-tab">
                <?php $res=mysqli_query($con,$consult); ?>
                <?php while($dato=mysqli_fetch_array($res)){ ?> 
                        <?php if($dato['GRADO']==3){ ?>
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Seccion <?php echo $dato['SECCION'];?></h3>
                                    <h5>  <?php echo $dato['NOMBRE']; ?> </h5>

                                    <a href="calificar.php">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollingModal">
                                        Calificar
                                    </button>
                                    </a>
                                    <a href="listaAlumnos.php">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                        Lista de Alumnos
                                    </button>   
                                    </a>                        

                                </div>
                            </div>
                        <?php } } ?> 
                </div>
                
                <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="contact-tab">
                <?php $res=mysqli_query($con,$consult); ?>
                <?php while($dato=mysqli_fetch_array($res)){ ?> 
                      <?php if($dato['GRADO']==4){ ?>
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Seccion <?php echo $dato['SECCION'];?></h3>
                                    <h5>  <?php echo $dato['NOMBRE']; ?> </h5>

                                    <a href="calificar.php">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollingModal">
                                        Calificar
                                    </button>
                                    </a>
                                    <a href="listaAlumnos.php">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                        Lista de Alumnos
                                    </button>   
                                    </a>                        

                                </div>
                            </div>
                        <?php } } ?> 
                </div>
               
                <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="contact-tab">
                <?php $res=mysqli_query($con,$consult); ?>
                <?php while($dato=mysqli_fetch_array($res)){ ?> 
                  <?php if($dato['GRADO']==5){ ?>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Seccion <?php echo $dato['SECCION'];?></h3>
                                <h5>  <?php echo $dato['NOMBRE']; ?> </h5>

                                <a href="calificar.php">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollingModal">
                                    Calificar
                                </button>
                                </a>
                                <a href="listaAlumnos.php">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                    Lista de Alumnos
                                </button>   
                                </a>                        

                            </div>
                        </div>
                  <?php } } ?> 
                </div>
             
            </div><!-- End Pills Tabs 
