<?php
require_once '../modelos/Usuario.php';

class UsuarioService {
    public function registrarUsuario($data) {
        // Validar los campos
        if (empty($data['nick']) || empty($data['mail']) || empty($data['contraseña'])) {
            return ['success' => false, 'message' => 'Todos los campos son obligatorios.'];
        }

        // Hash de la contraseña
        $hashedPassword = password_hash($data['contraseña'], PASSWORD_DEFAULT);

        // Crear el objeto Usuario
        $usuario = new Usuario();
        $usuario->setMail($data['mail']);
        $usuario->setNick($data['nick']);
        $usuario->setContraseña($hashedPassword);
        $usuario->setDirección($data['dirección'] ?? null);  // Usar dirección si está disponible

        // Guardar el usuario directamente desde el objeto Usuario
        if ($usuario->guardar()) {
            return ['success' => true, 'message' => 'Usuario registrado exitosamente.'];
        } else {
            return ['success' => false, 'message' => 'Error al registrar el usuario.'];
        }
    }

    public function loginUsuario($data) {
        if (empty($data['mail']) || empty($data['contraseña'])) {
            return ['success' => false, 'message' => 'Email y contraseña son obligatorios.'];
        }

        $usuario = new Usuario();
        $usuarioData = $usuario->obtenerUsuarioPorEmail($data['mail']);
        
        if ($usuarioData) {
            if (password_verify($data['contraseña'], $usuarioData['contraseña'])) {
                return ['success' => true, 'message' => 'Inicio de sesión exitoso.'];
            } else {
                return ['success' => false, 'message' => 'Contraseña incorrecta.'];
            }
        } else {
            return ['success' => false, 'message' => 'El usuario no existe.'];
        }
    }
}
