<?php
// Activar errores para depurar
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Datos de conexión
$servidor = "localhost";
$usuario = "alejandro";
$password = "123456";
$base_datos = "formulario_encuentranos_db";
// Crear conexión
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);
// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
// Recibir datos del formulario (verificando que existan)
$nombre = isset($_POST['nombre_completo']) ? $_POST['nombre_completo'] : '';
$celular = isset($_POST['numero_celular']) ? $_POST['numero_celular'] : '';
$correo = isset($_POST['correo_electronico']) ? $_POST['correo_electronico'] : '';
// Insertar en la base de datos
$sql = "INSERT INTO contactos (nombre_completo, numero_celular, correo_electronico) VALUES ('$nombre', '$celular', '$correo')";
if ($conexion->query($sql) === TRUE) {
    header("Location: formulario_exitoso.html");
    exit();
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}
$conexion->close();
?>
