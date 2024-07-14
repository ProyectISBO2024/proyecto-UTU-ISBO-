<?php
header('Content-Type: application/json');

// Obtener datos de la solicitud
$input = json_decode(file_get_contents('php://input'), true);
$mail = $input['mail'];
$password = $input['password'];

// Aquí deberías realizar la lógica para autenticar al usuario
// Ejemplo simple sin base de datos

// Validar las credenciales (aquí deberías consultar tu base de datos)
if ($mail === 'usuario@mail.com' && $password === 'contraseña') {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
}
?>
