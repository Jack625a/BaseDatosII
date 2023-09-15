<?php
if(isset($_GET["CiCliente"])){
    $CiCliente=$_GET["CiCliente"];
    //echo $NumeroHabitacion;
    //Obtencion de los atributos de la Entidad (POST)
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nuevoNombre=$_POST["nuevoNombre"];
        $nuevoApellido=$_POST["nuevoApellido"];
        $nuevoCorreo=$_POST["nuevoCorreo"];
        $nuevoCelular=$_POST["nuevoCelular"];
        $nuevoDireccion=$_POST["nuevoDireccion"];
        $nuevoEdad=$_POST["nuevoEdad"];
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
    $sql="UPDATE cliente SET CiCliente='$CiCliente',Nombre='$nuevoNombre', Apellido='$nuevoApellido', Correo='$nuevoCorreo', Celular='$nuevoCelular', Direccion='$nuevoDireccion', Edad='$nuevoEdad' WHERE CiCliente=$CiCliente";
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
    $sql="SELECT * FROM cliente WHERE CiCliente=$CiCliente";
    $resultado=$conn->query($sql);
    if($resultado->num_rows==1){
        $row=$resultado->fetch_assoc();
        $nombreActual=$row["Nombre"];
        $apellidoActual=$row["Apellido"];
        $correoActual=$row["Correo"];
        $celularActual=$row["Celular"];
        $direccionActual=$row["Direccion"];
        $edadActual=$row["Edad"];
    }
    else{
        echo "Usuario no econtrado";
    }
    $conn->close();
    }
}else{
    echo "Error Ci Cliente no especificada";
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
      <form class="d-flex" action="buscar_habitacion.php" method="POST">
        <input class="form-control me-2" type="number" placeholder="Buscar Habitacion" name="numeroHabitacionBuscar" id="numeroHabitacionBuscar" aria-label="Search" required>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

  <div class="container">
  <h1>Actualiazación de Datos</h1>
    <form action="actualizar.php?NumeroHabitacion=<?php echo $NumeroHabitacion ?>" method="post">
        <div class="form-group">
            <label for="nuevoNombre">Nuevo Nombre: </label>
            <input type="text" name="nuevoNombre" id="nuevoNombre" class="form-control" value="<?php echo $nombreActual ?>" required>
        
        </div>
        <div class="form-group">
        <label for="nuevoApellido">Nuevo Apellido: </label>
        <input type="text" name="nuevoApellido" class="form-control"value="<?php echo $apellidoActual ?>" required>
        
        </div>
        <div class="form-group">
        <label for="nuevoCorreo">Nuevo Correo: </label>
        <input type="email" name="nuevoCorreo" class="form-control" value="<?php echo $correoActual ?>" required>
        </div>
        <div class="form-group">
          <label for="nuevoCelular">Nuevo Celular: </label>
          <input type="number" name="nuevoCelular" class="form-control"value="<?php echo $celularActual ?> " required>
        </div>
        <div class="form-group">
          <label for="nuevoDireccion">Nuevo Direccion: </label>
          <input type="text" name="nuevoDireccion" class="form-control"value="<?php echo $direccionActual ?> " required>
        </div>
        <div class="form-group">
          <label for="nuevoEdad">Nuevo Edad: </label>
          <input type="number" name="nuevoEdad" class="form-control"value="<?php echo $edadActual ?> " required>
        </div>
        <div class="form-group">
        <input type="submit" value="Actualizar Cliente" class="form-control">
        </div>
        
    </form>
  </div>
    
</body>
</html>