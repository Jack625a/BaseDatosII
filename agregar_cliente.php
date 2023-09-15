<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Clientes</title>
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
    <h1>Agregar Clientes</h1>
    <form action="procesarAgregadoCliente.php" method="POST">
        <div class="form-group">
            <label for="ciCliente">Ci Cliente: </label>
                <input type="number" id="ciCliente" class="form-control" name="ciCliente" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre: </label>
                <input type="text" id="nombre" name="nombre" class="form-control"required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido: </label>
                <input type="text" id="apellido" name="apellido" class="form-control"required>
        </div>
        <div class="form-group">
            <label for="correo">Correo: </label>
                <input type="email" id="correo" class="form-control" name="correo"required>
        </div>
        <div class="form-group">
            <label for="celular">Celular: </label>
                <input type="tel" id="celular" class="form-control" name="celular" required>
        </div>

       <div class="form-group">
            <label for="direccion">Dirección: </label>
                <input type="text" id="direccion" class="form-control" name="direccion" required>
        </div>
        <div class="form-group">
            <label for="edad">Edad: </label>
                <input type="number" id="edad" class="form-control" name="edad" required>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">
            Agregar Cliente
        </button>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>