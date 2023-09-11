<?php
    //Variables para realizar la conexion con mysql
    $servername='localhost';
    $username='root';
    $password='';
    $database='hotel';

    //crear una conexion
    $conn= new mysqli($servername,$username,$password,$database);

    //Verificacion de la conexion 
    if($conn->connect_error){
        die("Conexion Fallida: ".$conn->connect_error);
    }
    echo "Conexion exitosa"."<br>";

$sql="SELECT CiCliente, Nombre, Apellido FROM cliente"; //Codigo SQL PARA SELECCIONAR 
//$sql="UPDATE cliente SET Nombre='Manuel' WHERE CiCliente=455123263";//Codigo SQL PARA ACTUALIZAR
$resultado=$conn->query($sql);
if ($resultado->num_rows>0){
    while($row=$resultado->fetch_assoc()){
        echo "CI CLIENTE: ".$row["CiCliente"]."<br>"."- Nombre Cliente: ".$row["Nombre"]. " ".$row["Apellido"]."<br><br>";
    }
}
else{
        echo "No existen registros";
    }


//Actualizacion
//$sql="UPDATE cliente SET Apellido='Vargas' WHERE CiCliente=455123263";

?>