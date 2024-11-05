<?php
require_once '../logica_negocio/controladores/UsuarioController.php';

$usuarioController = new UsuarioController();

// Prueba de registro
$resultado = $usuarioController->registrarUsuario("John Doe", "johndoe@example.com", "password123");
echo $resultado ? "Registro exitoso\n" : "Error en el registro\n";

// Prueba de inicio de sesión
$inicioSesion = $usuarioController->iniciarSesion("johndoe@example.com", "password123");
echo $inicioSesion ? "Inicio de sesión exitoso\n" : "Error en el inicio de sesión\n";
?>
