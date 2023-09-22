
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
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
<div class="container mt-5">
  <h2>Realizar Reserva</h2>
  <form action="procesarReserva.php" method="POST">
    <div class="form-row">
      <div class="form-group col-md-4" >
        <label for="ciCliente">Buscar Cliente por CI: </label>
        <input type="number" class="form-control" id="ciCliente" name="ciCliente" required>
        <button type="button" class="btn btn-outline-success mt-2" onclick="comprobarCliente()">
            Comprobar Cliente
        </button>
      </div>
      <br>
      <div class="form-group col-md-4" >
        <label for="tipoHabitacion">Seleccionar Tipo de Habitación Disponible: </label>
        
        <?php

          $tipoInicio="";
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
          //obtenr los datos con la consulta SQL
          $sql="SELECT Tipo, Disponibilidad FROM habitacion WHERE Disponibilidad='Disponible'";
          $resultado=$conn->query($sql);
          if($resultado->num_rows>0){
               
            echo ' <select name="tipoHabitacion" id="tipoHabitacion" class="form-control"> ';
            while ($row=$resultado->fetch_assoc()){
                           
              if($tipoInicio==""){
                echo "<option value='".$row["Tipo"]."'>".$row["Tipo"]. "</option>";
              }else{
                echo "<option value='".$row["Tipo"]."disabled' >".$tipoInicio. "</option>";
              }
              

            }
            echo ' </select> ';
          }else{
            echo "No hay habitaciones registradas";
          }
          $conn->close();

          
        ?>        
      </div>
          <br>

        <div class="form-group col-md-6">
          <label for="numeroHabitacionReserva">Numero de Habitación</label>
          <input type="text" id="numeroHabitacionReserva" name="numeroHabitacionReserva" class="form-control" readonly >
        </div>
      <div class="form-group col-md-6">
        <label for="fechaEntrada">Seleccionar Fecha de Entrada: </label>
        <input type="date" name="fechaEntrada" id="fechaEntrada" class="form-control" required >
      </div>
      <br>
      <div class="form-group col-md-6">
        <label for="fechaSalida">Seleccionar Fecha de Salida: </label>
        <input type="date" name="fechaSalida" id="fechaSalida" class="form-control" required >
      </div>
      <br>
      <div class="form-group col-md-6">
        <label for="numeroPersonas">Numero de Personas: </label>
        <input type="number" class="form-control" id="numeroPersonas" name="numeroPersonas" required>
      </div>
      <br>
      <div class="form-group col-md-6" >
          <label for="tipoPago">Tipo de Pago: </label>
          <select name="tipoPago" id="tipoPago" class="form-control">
            <option value="">Pago QR</option>
          </select>
      </div>
      <br>
          <div class="form-group col-md-6" >
              <button type="submit" class="btn btn-outline-success" id="reservar">
              Realizar reserva
              </button>
          </div>
      <br>
      <br>

    </div>
    <script>
      //agregar un evento (seleccion de un tipo de habitacion) actualizar el campo de Numero de Habitacion
          document.getElementById('tipoHabitacion').addEventListener("change", function(){
            var seleccionOpcion=this.options[this.selectedIndex];
            var numeroHabitacion=seleccionOpcion.value;

          //actualizar el campo numero de habitacion
          document.getElementById('numeroHabitacionReserva').value=numeroHabitacion;
          });
    </script>
  </form>
  
</div>



</body>
<script>
      function comprobarCliente(){
        var ciCliente=document.getElementById("ciCliente").value;
        //alert(ciCliente);
        $.post("comprobarCliente.php",{ciCliente:ciCliente},function(data){
          alert(data);
        });
      }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</html>