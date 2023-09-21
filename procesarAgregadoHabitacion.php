<?php
    //VERIFICAR EL FORMULARIO
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //DATOS DEL FORMULARIO
        $numeroHabitacion=$_POST["numeroHabitacion"];
        $tipo=$_POST["tipo"];
        $precio=$_POST["precio"];
        $estado=$_POST["estado"];
        $descripcion=$_POST["descripcion"];

        //varaibles para la conexion
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
        //echo "Conexion exitosa"."<br>";
        //Codigo SQL PARA INSERTAR NUEVOS REGISTROS (INSERT INTO)
        $sql="INSERT INTO habitacion (NumeroHabitacion, Tipo, Precio, Estado, Descripcion, Disponibilidad) VALUES ('$numeroHabitacion','$tipo','$precio','$estado','$descripcion','Disponible')";
        if($conn->query($sql)===TRUE){
            //echo "Nueva habitacion agregado correctamente";
            header("Location:inicio.php");//redirigir de nuevo a la pagina principal
                exit();
        }else{
            echo "Error al agregar: ".$conn->error;
        }
        //cerramos la conexion
        $conn->close();
    }
?>