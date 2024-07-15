<?php
header('Content-Type: application/json');

// Obtener datos de la solicitud
$input = json_decode(file_get_contents('php://input'), true);
$mail = isset($input['mail']) ? $input['mail'] : '';
$username = isset($input['username']) ? $input['username'] : '';

// Lógica de autenticación (esto debería validarse contra una base de datos)
$valid_mail = 'admin@mail.com';
$valid_username = 'admin';

if (($mail === $valid_mail || $username === $valid_username)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
}
?>

