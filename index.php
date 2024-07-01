<!DOCTYPE html>
<html lang="en">

<?php    // Parámetros de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectophp";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// echo "Conexión exitosa<br>";

$sql = "SELECT Nombre, id FROM Miembro";
$resultado = mysqli_query($conn, $sql);

// Recuperación y visualización de datos
// el mysqli_num_rows sirve para revisar cuantas filas tiene el resultado
// y el  mysqli_fetch_assoc toma el resultado de cada columna.
// lo que hace este if y while es mostrar el numero de datos que posee el resultado de la consulta e imprimirlo

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    <div class="container">
        <div class="card-header">
            <h1>Formulario</h1>
        </div>
        <div class="card-body">
            <form action="enlace.php" method="post">
                <label for="name">Nombre</label>
                <input type="text" class="form-control"  name="name" placeholder="Julian Perez" required></input>
                <br>
                <label for="edad">Edad</label>
                <input type="text" class="form-control"  name="edad" placeholder="27" required></input>
                <br>
                <label for="email">Correo</label>
                <input type="email" class="form-control"  name="email" placeholder="Ejemplo@gmail.com" required></input>
                <br>
                <label for="contrase">Contraseña</label>
                <input type="password" class="form-control"  name="contrase" placeholder="Ejemplo_123" required></input>
                <br>
                <button id="boton">Enviar</button>
            </form>
        </div>
        <div class="tabla">
            <h2>Mostrar datos</h2>
            <table>
                <ul>
                        <?php 
                        if (mysqli_num_rows($resultado) > 0) {
                        // Mostrar datos de cada fila
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID: " . $fila["id"] . " - Nombre: " . $fila["Nombre"]. "<br>";
                        }
                        } else {
                        echo "No se encontraron resultados.";
                        }
                        ?>
                </ul>
                
            </table>
            
        </div>
    </div>
    
</body>
</html>


