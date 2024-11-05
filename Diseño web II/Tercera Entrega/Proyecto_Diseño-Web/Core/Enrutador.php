<?php
class Enrutador {

    public function cargarControlador() {
        // Si no se ha pasado un controlador o acción, redirigimos al controlador por defecto
        $controlador = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'InicioController';
        $accion = isset($_GET['action']) ? $_GET['action'] : 'index';

        // Incluir el controlador correspondiente
        require_once '../controladores/' . $controlador . '.php';

        // Crear instancia del controlador
        $controlador = new $controlador();
        
        // Llamar a la acción del controlador
        if (method_exists($controlador, $accion)) {
            $controlador->$accion();
        } else {
            // Acción no encontrada, redirigir o mostrar error
            echo "Acción no encontrada";
        }
    }
}
