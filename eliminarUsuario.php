<?php
if(isset($_GET["CiCliente"])){
    $CiCliente=$_GET["CiCliente"];
    //echo $NumeroHabitacion;

    //Conectarnos con la base de datos
    //Mostrar los datos en la tabla
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

            //ELIMINAR LA HABITACION SELECCIONADA
            $sql="DELETE FROM cliente WHERE CiCliente=$CiCliente";
            if($conn->query($sql)===TRUE){
                header("Location:inicio.php");//redirigir de nuevo a la pagina principal
                exit();
            }else{
                echo "Error al eliminar la habitacion: ".$connect_error;
            }
            $conn->close();
}else{
    echo "Error Numero de habitacion no especificada";
}
?>