<?php
header('Content-Type: application/json');

// Obtener datos de la solicitud
$input = json_decode(file_get_contents('php://input'), true);
$username = $input['username'];
$mail = $input['mail'];
$password = $input['password'];

// Aquí deberías realizar la lógica para registrar al usuario en la base de datos
// Ejemplo simple sin base de datos

// Validar que el usuario no exista ya (aquí deberías consultar tu base de datos)
if ($username === 'existe' || $mail === 'existe@mail.com') {
    echo json_encode(['success' => false, 'message' => 'El nombre de usuario o el correo ya existen']);
    exit;
}

// Registro exitoso
echo json_encode(['success' => true]);
?>
