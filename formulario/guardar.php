<?php
// 1. Datos de conexión a la base de datos
$servidor = "localhost";
$usuario = "alejandro";
$password = "123456";
$base_datos = "formulario_encuentranos_db";

// 2. Crear la conexión usando mysqli
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar si hubo error de conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// 3. Recibir los datos enviados desde el formulario HTML mediante POST
$nombre = $_POST['nombre_completo'];
$celular = $_POST['numero_celular'];
$correo = $_POST['correo_electronico'];

// 4. Preparar la consulta SQL para insertar los datos en la tabla 'contactos'
$sql = "INSERT INTO contactos (nombre_completo, numero_celular, correo_electronico) VALUES ('$nombre', '$celular', '$correo')";

// 5. Ejecutar la consulta y verificar si se guardó
if ($conexion->query($sql) === TRUE) {
    header("Location: formulario_exitoso.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
// 6. Cerrar la conexión
$conexion->close();
?>
