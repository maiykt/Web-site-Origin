<?php
class conexion{
    private $user = "root";
    private $pass = "";
    function conectar(){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=libreria', $this->user, $this->pass);

            echo "Conexion correcta :)";
        }catch(PDOException $error ){
            echo "No me pude conectar" . $error->getNessage();
        }
    }
}
$nuevaconexion = new conexion();
$nuevaconexion ->conectar();


// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    // Preparar la consulta SQL para insertar los datos
    $consulta = "INSERT INTO contactos (nombre, email, mensaje) VALUES (:nombre, :email, :mensaje)";
    $stmt = $pdo->prepare($consulta);

    // Asignar valores a los parámetros de la consulta
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mensaje', $mensaje);

    // Ejecutar la consulta para insertar los datos en la tabla de contactos
    try {
        $stmt->execute();
        echo "¡Formulario enviado exitosamente!";
    } catch (PDOException $e) {
        echo "Error al enviar el formulario: " . $e->getMessage();
    }
}
?>
