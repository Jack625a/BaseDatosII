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

//$sql="SELECT CiCliente, Nombre, Apellido FROM cliente"; //Codigo SQL PARA SELECCIONAR 
//$sql="UPDATE cliente SET Nombre='Manuel' WHERE CiCliente=455123263";//Codigo SQL PARA ACTUALIZAR
//Actualizacion de todos los datos
//$sql="UPDATE cliente SET Nombre='Maria', Apellido='Vargas Rocha',Correo='abcn@gmail.com',Celular=7451129,Direccion='av. 123 abc',Edad=23 WHERE CiCliente=4555621";
//Eliminacion de Datos
//$sql="DELETE FROM cliente WHERE CiCliente=1255546";
//Filtracion de Datos con Condicionales
$edadSeleccionada=23;
$sql="SELECT CiCliente, Nombre, Apellido, Edad FROM cliente WHERE Edad>=$edadSeleccionada ORDER BY cliente.Edad ASC LIMIT 4";


$resultado=$conn->query($sql);
if ($resultado->num_rows>0){
    while($row=$resultado->fetch_assoc()){
        echo "CI CLIENTE: ".$row["CiCliente"]."<br>"."- Nombre Cliente: ".$row["Nombre"]. " ".$row["Apellido"]."<br>"."- Edad: ".$row["Edad"]."<br><br>";
    }
}
else{
        echo "No existen registros";
    }


//Actualizacion de Datos
//$sql="UPDATE cliente SET Apellido='Vargas' WHERE CiCliente=455123263";
//Actualizacion de todos los registros
//$sql="UPDATE cliente SET Nombre='Maria', Apellido='Vargas Rocha',Correo='abcn@gmail.com',Celular=7451129,Direccion='av. 123 abc',Edad=23 WHERE CiCliente=4555621";

//Eliminacion de Datos=> DELETE FROM cliente WHERE CiCliente=455123326
//$sql="DELETE FROM cliente WHERE CiCliente=1255546";

//Filtrado de Datos
//Ejercicio 1. Filtrar los datos del cliente que sean mayores de 23 años
//$edadSeleccionada=23;
//$sql="SELECT CiCliente, Nombre, Apellido, Edad FROM cliente WHERE Edad>=$edadSeleccionada";

//ORDENAR Y LIMITAR LOS RESULTADOS SQL (ORDER BY)- ORDENAR (LIMIT)- LIMITAR
 



?>