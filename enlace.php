<?php
    // Parámetros de conexión
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
echo "Conexión exitosa<br>";

// Consulta para insertar un nuevo registro
$sql = "INSERT INTO miembro (nombre, id) VALUES ('Juan Perez', 123)";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();