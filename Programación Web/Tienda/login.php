<?php
header('Content-Type: application/json');

// Obtener datos de la solicitud
$input = json_decode(file_get_contents('php://input'), true);
$mail = $input['mail'];
$password = $input['password'];

if ($mail === 'usuario@mail.com' && $password === 'contraseña') {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
}
?>
