<?php
    //verificar el formulario
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //DATOS DEL FORMULARIO
        $numeroHabitacionBuscado=$_POST["numeroHabitacionBuscar"];
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
        //Consulta SQL PARA FILTRAR POR NUMERO HABITACION
        $sql="SELECT * FROM habitacion WHERE NumeroHabitacion=$numeroHabitacionBuscado";
        $resultado=$conn->query($sql);
        //Verificamos si se encontro el resultado de la busqueda
        if($resultado->num_rows>0){
            echo "<!DOCTYPE html>";
            echo "<html lang='en'>";
            echo"<head>";
            echo    "<meta charset='UTF-8'>";
            echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
                
            echo "</head>";
            echo "<body>";
            echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">';
            echo '<div class="container-fluid">';
            echo   "<a class='navbar-brand' href='#'>HOTEL CATEC</a>";
            echo   "  <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>";
            echo   "   <span class='navbar-toggler-icon'></span>";
            echo   " </button>";
            echo   " <div class='collapse navbar-collapse' id='navbarSupportedContent'>";
            echo   "   <ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
            echo   '       <li class="nav-item">';
            echo   '       <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>';
            echo   '     </li>';
            echo   '     <li class="nav-item">';
            echo   '       <a class="nav-link" href="agregar_habitacion.php">Agregar Habitaciones</a>';
            echo   '     </li>';
            echo   '      <li class="nav-item">';
            echo   '       <a class="nav-link" href="agregar_cliente.php">Agregar Clientes</a>';
            echo   '      </li>';
            echo   '      <li class="nav-item">';
            echo   '       <a class="nav-link" href="reservas.php">Reservas</a>';
            echo   '      </li>';
            echo   '<li class="nav-item">
            <a class="nav-link" href="reporteReservas.php">Reporte Reservas</a>
          </li>';
            echo   '     </ul>';
            echo   '     <form class="d-flex" action="buscar_habitacion.php" method="POST">';
            echo   '      <input class="form-control me-2" type="number" placeholder="Buscar Habitacion" aria-label="Search" required>';
            echo   '      <button class="btn btn-outline-success" type="submit">Buscar</button>';
            echo   '     </form>';
            echo   '  </div>';
            echo   ' </div>';
            echo   '</nav>';
            echo '<div class="container">';
            echo '<h3>Resultado de la Busqueda de la Habitación </h3>';
            echo '<table class="table table-striped table-bordered">';
            echo "<tr>";

            echo  '<th>Numero de Habitacion</th>
                <th>Tipo de Habitacion </th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Descripcion</th>';
            echo '</tr>';
            //MOSTRAR LOS RESULTADO DE LA HABITACION BUSCADA
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
            echo '</div>';
            echo   '</body>';
            echo   '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>';
            echo   '</html>"';
    }else{
        header("Location:inicio.php?encontrado='No'");//redirigir de nuevo a la pagina principal
        exit();
        
        //echo '<script> alert("Habitacion No Encontrada")</script>';
    }
    //CERRAMOS LA CONEXION 
    $conn->close();
}
?>