<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Reservas</title>
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
        <li class="nav-item">
          <a class="nav-link" href="reporteReservas.php">Reporte Reservas</a>
        </li>
      </ul>
      <form class="d-flex" action="buscar_habitacion.php" method="POST">
        <input class="form-control me-2" type="number" placeholder="Buscar Habitacion" name="numeroHabitacionBuscar" id="numeroHabitacionBuscar" aria-label="Search" required>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
<div class="container mt-4" >
<h1 class="text-center" >Reporte de Reservas</h1>
<table class="table table-bordered table-hover" >
    <thead class="thead-dark">
        <tr>
            <th>Codigo Reserva</th>
            <th>Tipo de Habitación</th>
            <th>Fecha Entrada</th>
            <th>Fecha Salida</th>
            <th>Ci Cliente</th>
            <th>Numero de Personas</th>
            <th>Tipo de Pago</th>
        </tr>
    </thead>
    <tbody>
        <?php
            //Conexion con la base de datos
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
            //CONSULTA SQL
            $sql="SELECT * FROM reserva";
            $resultado=$conn->query($sql);
            if($resultado->num_rows>0){
                //echo "Se tiene registros en la entidad reserva";
                while($row=$resultado->fetch_assoc()){
                    echo '<tr>';
                    echo  "<td>".$row["CodigoReserva"]. "</td>";  
                    echo  "<td>".$row["TipoHabitacion"]. "</td>"; 
                    echo  "<td>".$row["FechaEntrada"]. "</td>"; 
                    echo  "<td>".$row["FechaSalida"]. "</td>"; 
                    echo  "<td>".$row["CiCliente"]. "</td>"; 
                    echo  "<td>".$row["NumeroPersonas"]. "</td>"; 
                    echo  "<td>".$row["TipoPago"]. "</td>";
                    echo "</tr>";
                }
            }else{
                echo "No existen reservas realizadas";
            }
            //Cerrar la conexion
            $conn->close();
        ?>
    </tbody>
</table>
</div>

<div class="container mt-4" >
    <h1 class="text-center" >Reporte por Fechas </h1>
    <form action="" method="get">
        <div class="form-row" >
            <label for="fechaInicio">Fecha Inicio: </label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
        </div>
        <br>
        <div class="form-row">
            <label for="fechaFin">Fecha Final: </label>
            <input type="date" name="fechaFin" id="fechaFin" class="form-control" required>
        </div>
        <br>
    
        <div class="col-md-4" >
            <button type="submit" class="btn btn-outline-success " >
                Filtrar Reporte
            </button>
        </div>
    </form>
    <br>
    <div class="container" >
    <table class="table table-bordered table-hover" >
    <thead class="thead-dark">
        <tr>
            <th>Codigo Reserva</th>
            <th>Tipo de Habitación</th>
            <th>Fecha Entrada</th>
            <th>Fecha Salida</th>
            <th>Ci Cliente</th>
            <th>Numero de Personas</th>
            <th>Tipo de Pago</th>
        </tr>
    </thead>
    <tbody>
    <?php
            //Conexion con la base de datos
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
            //CONSULTA SQL
            $fechaFin=$_GET['fechaFin'];
            $fechaInicio=$_GET['fechaInicio'];
            //echo $fechaInicio;
            //echo $fechaFin;
            $sqlReporte="SELECT * FROM reserva WHERE FechaEntrada>='$fechaInicio' AND FechaSalida<='$fechaFin'";
            //Mostrar el resultado de la reserva
            $resultado=$conn->query($sqlReporte);
            if($resultado->num_rows>0){
                //echo "Se tiene registros en la entidad reserva";
                while($row=$resultado->fetch_assoc()){
                    echo '<tr>';
                    echo  "<td>".$row["CodigoReserva"]. "</td>";  
                    echo  "<td>".$row["TipoHabitacion"]. "</td>"; 
                    echo  "<td>".$row["FechaEntrada"]. "</td>"; 
                    echo  "<td>".$row["FechaSalida"]. "</td>"; 
                    echo  "<td>".$row["CiCliente"]. "</td>"; 
                    echo  "<td>".$row["NumeroPersonas"]. "</td>"; 
                    echo  "<td>".$row["TipoPago"]. "</td>";
                    echo "</tr>";
                }
            }else{
                echo "No existen reservas realizadas";
    
            }
            //Cerrar la conexion
            $conn->close();
        ?>
    </tbody>
    </table>
    <br>
    <div class="col-md-4" >
            <button type="button" class="btn btn-outline-success " onclick="imprimir()">
                Imprimir Reporte
            </button>
        </div>
    <br>
    <br>
    </div>

    <script>
        function imprimir(){
            window.print();
        }
    </script>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>