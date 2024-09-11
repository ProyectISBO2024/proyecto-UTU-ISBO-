<?php
session_start();
require_once 'controllers/UsuarioController.php';

$controller = new UsuarioController();

// Si el usuario no ha iniciado sesión y no está intentando hacer login, redirigir al login
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$idC = isset($_GET['idC']) ? $_GET['idC'] : null;

if (!isset($_SESSION['usuario']) && $action !== 'login') {
    header('Location: ?action=login');
    exit;
}

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo $controller->create($_POST);
        } else {
            include 'views/crearUsuario.php';
        }
        break;
    case 'list':
        $usuarios = $controller->readAll();
        include 'views/listarUsuarios.php';
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo $controller->update($_POST);
        } else {
            $usuario = $controller->readOne($idC);
            include 'views/editarUsuario.php';
        }
        break;
    case 'delete':
        echo $controller->delete($idC);
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginResult = $controller->login($_POST);
            if ($loginResult) {
                header('Location: ?action=list'); // Redirigir a listar usuarios si el login es exitoso
                exit;
            } else {
                $error = "Nombre de usuario o contraseña incorrectos.";
            }
        }
        include 'views/loginUsuario.php';
        break;
    case 'logout':
        session_destroy();
        header('Location: ?action=login');
        exit;
    default:
        $usuarios = $controller->readAll();
        include 'views/listarUsuarios.php';
        break;
}
?>
