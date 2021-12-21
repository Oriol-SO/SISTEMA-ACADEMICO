<?php 
require('../connect.php');

$consult1="SELECT*FROM ALUMNO";
$consult2="SELECT*FROM PROFESOR";
$consult3="SELECT*FROM DIRECTOR";
$consult4="SELECT*FROM ADMINISTRADOR";

$res1=mysqli_query($con,$consult1);
$res2=mysqli_query($con,$consult2);
$res3=mysqli_query($con,$consult3);
$res4=mysqli_query($con,$consult4);

$alumnos=mysqli_num_rows($res1);
$doc=mysqli_num_rows($res2);
$direc=mysqli_num_rows($res3);
$admi=mysqli_num_rows($res4);


$empleados=$doc+$direc+$admi;

?>