<?php
// Incluimos el modelo Admin para interactuar con la base de datos
require_once '../models/Admin.php';

class AdminController {

    // Método para mostrar el formulario de inicio de sesión
    public function login() {
        // Si el usuario ya está logueado, lo redirigimos al dashboard
        session_start();
        if (isset($_SESSION['user_id'])) {
            header('Location: dashboard.php');
            exit();
        }

        // Mostrar la vista de login
        require_once '../views/admin/login.php';
    }

    // Método para manejar el inicio de sesión
    public function authenticate() {
        // Verificamos si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibimos los datos del formulario
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Creamos una instancia del modelo Admin
            $adminModel = new Admin();
            $user = $adminModel->getUserByEmail($email);

            // Si encontramos al usuario y la contraseña es correcta
            if ($user && password_verify($password, $user['password'])) {
                // Iniciamos sesión
                session_start();
                $_SESSION['user_id'] = $user['idC']; // Guardamos el id del usuario
                $_SESSION['user_email'] = $user['email']; // Guardamos el email
                $_SESSION['user_role'] = $user['role']; // Guardamos el rol (si existe)

                // Redirigimos a la página de administración (dashboard)
                header('Location: dashboard.php');
                exit();
            } else {
                // Si las credenciales no son correctas, volvemos a mostrar el formulario de login con un mensaje de error
                $_SESSION['error_message'] = 'Correo electrónico o contraseña incorrectos.';
                header('Location: admin.php?action=login');
                exit();
            }
        }
    }

    // Método para cerrar sesión
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: admin.php?action=login');
        exit();
    }
}
?>
