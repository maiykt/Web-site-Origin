<?php
// Conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=libreria';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// ... Código de conexión y consulta a la base de datos ...

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar los datos del formulario
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $fecha = $_POST["fecha"];
    $mensaje = $_POST["message"];

    // Validar los campos según tus necesidades
    // ...

    // Si no hay errores, proceder a insertar los datos en la base de datos
    if (/* Validar campos correctamente */) {
        // Preparar y ejecutar la consulta para insertar los datos en la tabla de contactos
        // ...

        echo "success"; // Envío exitoso
    } else {
        echo "error"; // Envío con errores
    }
}
?>
