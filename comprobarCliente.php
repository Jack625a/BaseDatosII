<?php
    //Obtenemos el datos del ciCliente para su verificacion
    if(isset($_POST["ciCliente"])){
        $ciCliente=$_POST["ciCliente"];
        //validacion con la conexion de datos
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
        //Crear la solicitud SQL
        $sql="SELECT * FROM cliente WHERE CiCliente='$ciCliente'";
        $resultado=$conn->query($sql);
        if($resultado->num_rows>0){
            //Cliente existe y se puede proceder a la reserva
            echo "Cliente Validado";

        }else{
            //El CLiente no cuenta con registro
            echo "Cliente no cuenta con registro, Registrar al usuario";
            //header("Location:agregar_cliente.php");//redirigir de nuevo a la pagina principal
             //exit();
        }
        //cerrar la conexion
        $conn->close();

    }else{
        echo "Error Ci del Cliente no fue recibido";
    }

?>