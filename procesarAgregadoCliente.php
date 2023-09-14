<?php
    //VERIFICAR EL FORMULARIO
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //DATOS DEL FORMULARIO
        $ciCliente=$_POST["ciCliente"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $correo=$_POST["correo"];
        $celular=$_POST["celular"];
        $direccion=$_POST["direccion"];
        $edad=$_POST["edad"];

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
        $sql="INSERT INTO cliente (CiCliente, Nombre, Apellido,Correo,Celular,Direccion,Edad) VALUES ('$ciCliente','$nombre','$apellido','$correo','$celular','$direccion','$edad')";
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