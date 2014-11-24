<?php
include_once('connection.php');

//escape variables for security
$user=mysqli_real_escape_string($connection, $_POST['user']);
$articulo = mysqli_real_escape_string($connection, $_POST['articulo']);
$estArticulo = mysqli_real_escape_string($connection, $_POST['estArticulo']);
$precio= mysqli_real_escape_string($connection, $_POST['precio']);
$descripcion = mysqli_real_escape_string($connection, $_POST['descripcion']);
$calle = mysqli_real_escape_string($connection, $_POST['calle']);
$estado=mysqli_real_escape_string($connection, $_POST['estados']);
$cuidad=mysqli_real_escape_string($connection, $_POST['cuidad']);
$cp=mysqli_real_escape_string($connection, $_POST['codigoPostal']);

if (preg_match("/^[.áéíóúa-zA-Z0-9 ]*$/",$calle) && preg_match("/^[áéíóúa-zA-Z ]*$/",$cuidad)&& preg_match("/^[0-9]*$/",$precio) && preg_match("/^[0-9]*$/",$cp)) {
  $sql="INSERT INTO Articulo (usuarioId, nombre, estadoArticulo, precio, descripcion, calle, state, cuidad, codigoPostal,vendido)
  VALUES ('$user','$articulo', '$estArticulo','$precio', '$descripcion','$calle', '$estado', '$cuidad', '$cp','0')";

  if (!mysqli_query($connection,$sql)) {
    die('Error: ' . mysqli_error($connection));
  }else{
    //echo $userId;
    include('displayArticulo.php');
  }
        

}else{

  echo "Por favor llenar la forma correctamente.\n Regrese a la página anterior para hacer correcciones.";
      
}
?>