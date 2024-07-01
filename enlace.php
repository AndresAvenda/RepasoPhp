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

//toma de variables del formulario
$name = $_POST['name'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$contrase = $_POST['contrase'];

//consulta
$sql = "INSERT INTO miembro (Nombre, edad, email, contrase) VALUES ('$name', '$edad', '$email', '$contrase')";

//Mostrar los datos que hay en la base de datos en una tabla 
if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();