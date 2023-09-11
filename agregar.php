<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
//Conexion con la base de datos
$conexion=new mysqli(
    "localhost",
    "root",
    "",
    "biblioteca"
);
// Verificacion de conexion a la base de datos
if ($conexion->connec_error{
    die ("Error de conexion")
}
    
)
//oBTENER LOS DATOS DEL FORMULARIOS
$nombre=$_POST["Nombre"];
$celular=$_POST["Celular"];
$correo=$_POST["Email"];


$sql= "INSERT INTO cliente (`idCliente`, `nombreCliente`, `celular`, `correo`) VALUES('$nombre','$celular','$correo')";
 if ($conexion->query($sql)===TRUE)
 {
    header("Location: index.html"),
    exit();
 } else{
    echo "Error al agregar usuario";
 }
 //CERRAR LA CONEXION
 $conexion->close();

}

?>