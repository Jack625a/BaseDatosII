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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HOTEL CATEC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="agregar_habitacion.php">Agregar Habitaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="agregar_cliente.php">Agregar Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reservas.php">Reservas</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar Habitacion" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
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