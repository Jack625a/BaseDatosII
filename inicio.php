<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL CATEC</title>
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
    <div class="container">
    <h1>Listado de Habitaciones</h1>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Numero de Habitacion</th>
            <th>Tipo de Habitacion </th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Descripcion</th>
        </tr>
        <?php
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

        $sql="SELECT * FROM habitacion";
        $resultado=$conn->query($sql);
        if($resultado->num_rows>0){
            while($row=$resultado->fetch_assoc()){
                echo "<tr>";
                echo "<td>". $row["NumeroHabitacion"]."</td>";
                echo "<td>". $row["Tipo"]."</td>";
                echo "<td>". $row["Precio"]."</td>";
                echo "<td>". $row["Estado"]."</td>";
                echo "<td>". $row["Descripcion"]."</td>";
                
                echo "<td><a href='actualizar.php?NumeroHabitacion=".$row["NumeroHabitacion"]."'>Actualizar</a></td>";
                echo "<td><a href='eliminar.php?NumeroHabitacion=".$row["NumeroHabitacion"]."'>Eliminar</a></td>";
                
                echo "</tr>";

                
            }
        }else
        {
            echo "Error no existen registros";
        }
        $conn->close();
        ?>
    </table>
    </div>
    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>