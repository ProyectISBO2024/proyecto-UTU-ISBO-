<?php
require_once 'models/Usuario.php';


class UsuarioController {
    public function create($data) {
        $usuario = new Usuario();
        $usuario->setMail($data['mail']);
        $usuario->setNick($data['nick']);
        $usuario->setDirección($data['dirección']);
        $usuario->setContraseña($data['contraseña']);
        if ($usuario->create()) {
            return "Usuario creado exitosamente.";
        } else {
            return "Error al crear usuario.";
        }
    }

    public function readAll() {
        $usuario = new Usuario();
        return $usuario->readAll();
    }

    public function readOne($idC) {
        $usuario = new Usuario();
        $usuario->setIdC($idC);
        return $usuario->readOne();
    }

    public function update($data) {
        $usuario = new Usuario();
        $usuario->setIdC($data['idC']);
        $usuario->setMail($data['mail']);
        $usuario->setNick($data['nick']);
        $usuario->setDireccion($data['dirección']);
        $usuario->setContraseña($data['contraseña']);
        if ($usuario->update()) {
            return "Usuario actualizado exitosamente.";
        } else {
            return "Error al actualizar usuario.";
        }
    }

    public function delete($idC) {
        $usuario = new Usuario();
        $usuario->setIdC($idC);
        if ($usuario->delete()) {
            return "Usuario eliminado exitosamente.";
        } else {
            return "Error al eliminar usuario.";
        }
    }

    public function login($data) {
        $usuario = new Usuario();
        $usuario->setNick($data['nick']);
        $usuario->setContraseña($data['contraseña']);
        $result = $usuario->login();
        if ($result) {
            // Login exitoso
            $_SESSION['usuario'] = $result['nick'];
            return true;
        } else {
            // Login fallido
            return false;
        }
    }
}

?>
