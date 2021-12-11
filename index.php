<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
    <link rel="stylesheet" href="estilos/login.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
 
<body> 
<div class="capa">  
    <!--img src="fondo.jpg" alt=""-->
<div class="login-box">    
    <form method="post">
         <div class="title">
            <h1>SISTEMA ACADEMICO</h1>
        </div>
        
        <label for="ROL">ROL</label>
            <div class="roles">
                <select name="rol" id="rol">
                    
                        <option value="alu">Alumno</option>
                        <option value="profe">Docente</option>
                        <option value="direc">Director</option>
                        <option value="admi">Administrador</option>

                        
                </select>
            </div>
            <!--username-->
            <label for="USERNAME">NOMBRE DE USUARIO</label>
            <input type="text" name="user" placeholder="Ingresar DNI" value="">

            <!--password-->
            <label for="PASSWORD">CONTRASEÑA</label>
            <input type="password" name="password" placeholder="Ingresar contraseña">
            

            <input type="submit" name="validar" value="INGRESAR">
        
        
    </form>
    
</div> 

</div>
    <?php    
     require('validar.php');
    ?>



</body>
</html>