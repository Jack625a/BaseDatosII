<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL CATEC</title>
</head>
<body>
    <h1>Listado de Habitaciones</h1>
    <table>
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
            echo "Conexion exitosa"."<br>";

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
</body>

</html>