<?php
// Conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=libreria1';
$user = 'root';
$pass = '';



try {
  $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conexión a la base de datos exitosa";
} catch (PDOException $e) {
  die("Error al conectarse a la base de datos: " . $e->getMessage());
}

// Procesar el formulario cuando se envía


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["name"];
    $correo = $_POST["email"];
    $fecha = $_POST["fecha"];
    $mensaje = $_POST["message"];

  // Preparar la consulta SQL para insertar los datos
  $consulta = "INSERT INTO contacto (nombre, correo, fecha, mensaje) VALUES (:nombre, :correo, :fecha, :mensaje)";
  $stmt = $pdo->prepare($consulta);

  // Asignar valores a los parámetros de la consulta
  $stmt->bindParam(':nombre', $nombre);
  $stmt->bindParam(':correo', $correo);
  $stmt->bindParam(':fecha', $fecha);
  $stmt->bindParam(':mensaje', $mensaje);

  // Ejecutar la consulta para insertar los datos en la tabla de Contacto
  try {
      $stmt->execute();
      header("Location: index.html"); // Redirigir a la página principal después de enviar el formulario
  } catch (PDOException $e) {
      die("Error al enviar el formulario: " . $e->getMessage());
  }
}
?>