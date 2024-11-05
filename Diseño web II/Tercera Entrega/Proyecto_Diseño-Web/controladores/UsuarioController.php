<?php

require_once '../modelos/Usuario.php';

class UsuarioController {
     // Acción para mostrar el formulario de login
     public function login1() {
        // Simplemente carga la vista de login
        require_once '../vistas/login.php';
    }

    // Acción para mostrar el formulario de registro
    public function register1() {
        // Simplemente carga la vista de registro
        require_once '../vistas/register.php';
    }
    public function login() {
        // Obtener los datos del login desde el cuerpo de la solicitud
        $data = json_decode(file_get_contents("php://input"), true);
        
        $email = $data['email'];
        $password = $data['password'];
        
        // Crear una instancia de Usuario y verificar las credenciales
        $usuario = new Usuario();
        $resultado = $usuario->verificarCredenciales($email, $password);

        if ($resultado) {
            // Si las credenciales son correctas, iniciar sesión
            session_start();
            $_SESSION['usuario'] = $resultado; // Guarda los datos del usuario en la sesión
            echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.']);
        }
    }

    public function listar() {
        $usuario = new Usuario();
        $usuarios = $usuario->listarUsuarios();
        require_once '../view/listarVendedor.php';
    }
    public function crear() {
        if (isset($_POST['nick'])) {
            $usuario = new Usuario();
            $usuario->setNick($_POST['nick']); 
            $usuario->setMail($_POST['mail']); 
            $usuario->setDirección($_POST['dirección']); 
            $usuario->setContraseña($_POST['Contraseña']);
            
            // Revisa los valores después de asignarlos
            var_dump($usuario);
            
            if ($usuario->guardar()) { 
                header('Location: index.php?controller=Usuario&action=listar');
            } else {
                echo "Error al guardar el usuario.";
            }
        }
        require_once '../view/listarVendedor.php';
    }
    
    public function ingresar() {
        require_once '../view/ingresarVendedor.php';  // Carga la vista para ingresar un nuevo usuario
    }

    
    public function crearusr() {
        if (isset($_POST['nick'])) {
            // Crear un nuevo objeto Usuario
            $usuario = new Usuario();
            
            // Establecer las propiedades del objeto Usuario con los datos del formulario
            $usuario->setNick($_POST['nick']); // Nick del usuario
            $usuario->setMail($_POST['mail']); // Correo electrónico del usuario
            $usuario->setDirección($_POST['dirección']); // Dirección
            $usuario->setContraseña($_POST['contraseña']); // Contraseña
    
            // Guardar el usuario en la base de datos
            if ($usuario->guardar()) { 
                // Redirigir a la lista de usuarios después de guardar el nuevo usuario
                header('Location: index.php?controller=Usuario&action=listar');
            } else {
                // Mostrar un mensaje de error si no se guardó
                echo "Error al guardar el usuario.";
            }
        }
        // Mostrar el formulario para ingresar un nuevo usuario
        require_once '../view/ingresarVendedor.php';
    }
    
    

    public function editar() {
        $id = $_GET['id'];
        $usuario = new Usuario();
        $usuarioExistente = $usuario->obtenerUsuario($id);
        require_once '../view/editarUsuario.php';
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
           
            $usuario->setnick($_POST['nick']);
            $usuario->setMail($_POST['email']);
           
            if ($usuario->actualizar()) {
                header('Location: index.php?controller=Usuario&action=listar');
            } else {
                echo "Error al actualizar el usuario.";
            }
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        $usuario = new Usuario();
        if ($usuario->eliminar($id)) {
            header('Location: index.php?controller=Usuario&action=listar');
        } else {
            echo "Error al eliminar el usuario.";
        }
    }
}