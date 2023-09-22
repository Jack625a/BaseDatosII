<?php
    //Verificacion de los datos envios del formulario de reserva
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    //OBTENEMOS LOS DATOS DEL FORMULARIO
    $tipoHabitacion=$_POST["tipoHabitacion"];
    $fechaEntrada=$_POST["fechaEntrada"];
    $fechaSalida=$_POST["fechaSalida"];
    $ciCliente=$_POST["ciCliente"];
    $numeroPersonas=$_POST["numeroPersonas"];
    $tipoPago=$_POST["tipoPago"];
    $numeroHabitacionReserva=$_POST["numeroHabitacionReserva"];

    //realizar la conexion con la base de datos
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
    //Codigo SQL para realizar una nueva reserva
    $sql="INSERT INTO reserva (`TipoHabitacion`, `FechaEntrada`, `FechaSalida`, `CiCliente`, `NumeroPersonas`, `TipoPago`, `NumeroHabitacionReserva`) VALUES ('$tipoHabitacion','$fechaEntrada','$fechaSalida','$ciCliente','$numeroPersonas','$tipoPago','$numeroHabitacionReserva')";
    if($conn->query($sql)===TRUE){
        //echo "Reserva realizada con exito";
        header("Location:inicio.php");//redirigir de nuevo a la pagina principal
        exit();
    }else{
        "Error al realizar la reserva: ".$conn->error;
    }
    //Cerramos la conexion
    $conn->close();

   }else{
    echo "Acceso no autorizado";
   }


  
?>