<?php
if(isset($_GET["NumeroHabitacion"])){
    $NumeroHabitacion=$_GET["NumeroHabitacion"];
    //echo $NumeroHabitacion;
    //Obtencion de los atributos de la Entidad (POST)
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nuevoTipo=$_POST["nuevoTipo"];
        $nuevoPrecio=$_POST["nuevoPrecio"];
        $nuevoEstado=$_POST["nuevoEstado"];
        $nuevoDescripcion=$_POST["nuevoDescripcion"];
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
            //ACTUALIZAR LOS DATOS DE LA HABITACION
    $sql="UPDATE habitacion SET NumeroHabitacion='$NumeroHabitacion',Tipo='$nuevoTipo', Precio='$nuevoPrecio', Estado='$nuevoEstado', Descripcion='$nuevoDescripcion' WHERE NumeroHabitacion=$NumeroHabitacion";
        if($conn->query($sql)===TRUE){
            header("Location:inicio.php");//Redirigir a la pagina principal
            exit();
        }else{
            echo "Error al actualizar los datos: ".$conn->error;
        }
        $conn->close();
    }
    else{
    //CREACION DE UN FORMULARIO DE ACTUALIZACION DE DATOS (HABITACION)
    //Paso 1. Obtener los datos de la seleccion
    $conn=new mysqli("localhost","root","","hotel");
    if($conn->connect_error){
        die ("Conexion Fallida");
    }
    $sql="SELECT * FROM habitacion WHERE NumeroHabitacion=$NumeroHabitacion";
    $resultado=$conn->query($sql);
    if($resultado->num_rows==1){
        $row=$resultado->fetch_assoc();
        $tipoActual=$row["Tipo"];
        $precioActual=$row["Precio"];
        $estadoActual=$row["Estado"];
        $descripcionActual=$row["Descripcion"];
    }
    else{
        echo "Habitacion no econtrada";
    }
    $conn->close();
    }
}else{
    echo "Error Numero de habitacion no especificada";
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de Datos</title>
</head>
<body>
    <h1>Actualiazación de Datos</h1>
    <form action="actualizar.php?NumeroHabitacion=<?php echo $NumeroHabitacion ?>" method="post">
        <label for="nuevoTipo">Nuevo Tipo: </label>
        <input type="text" name="nuevoTipo" value="<?php echo $tipoActual ?>" required>
        <br>
        <label for="nuevoPrecio">Nuevo Precio: </label>
        <input type="number" name="nuevoPrecio" value="<?php echo $precioActual ?>" required>
        <br>
        <label for="nuevoEstado">Nuevo Estado: </label>
        <input type="text" name="nuevoEstado" value="<?php echo $estadoActual ?>" required>
        <br>
        <label for="nuevoDescripcion">Nuevo Descripcion: </label>
        <input type="text" name="nuevoDescripcion" value="<?php echo $descripcionActual ?> " required>
        <br>
        <input type="submit" value="Actualizar Habitacion">
    </form>
</body>
</html>