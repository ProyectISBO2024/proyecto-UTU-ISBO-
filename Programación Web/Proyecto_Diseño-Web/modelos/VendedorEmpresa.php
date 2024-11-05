<?php
require_once '../modelos/VendedorEmpresa.php';

class VendedorEmpresaController {

    // Acción para mostrar el formulario
    public function crearVendedor() {
        require_once '../vistas/registroVendedor.php';
    }

    // Acción para registrar el vendedor en la base de datos
    public function registrar() {
        // Verificar si los datos fueron enviados por POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Obtener el ID del Usuario y el teléfono desde el formulario
            $idC = $_POST['idC'];  // ID del usuario (administrador lo ingresa)
            $telefono = $_POST['telefono']; // Teléfono

            // Validar que los datos estén presentes
            if (empty($idC) || empty($telefono)) {
                echo "Por favor, complete todos los campos.";
                return;
            }

            // Crear una instancia del modelo y guardar los datos
            $vendedorEmpresa = new VendedorEmpresa();
            if ($vendedorEmpresa->guardarVendedor($idC, $telefono)) {
                echo "Vendedor Empresa registrado correctamente.";
            } else {
                echo "Error al registrar el vendedor.";
            }
        } else {
            echo "Los datos no se enviaron correctamente.";
        }
    }
}
?>
