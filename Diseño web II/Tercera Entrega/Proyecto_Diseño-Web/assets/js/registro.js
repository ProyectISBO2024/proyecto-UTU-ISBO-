document.addEventListener("DOMContentLoaded", () => {
    const registroForm = document.getElementById("registroForm");
    const errorMessageDiv = document.getElementById("error-message");

    registroForm.addEventListener("submit", async (event) => {
        event.preventDefault(); // Evita el envío normal del formulario

        const nombre = document.getElementById("nombre").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const direccion = document.getElementById("direccion").value; 

        if (!nombre || !email || !password || !direccion) { 
            mostrarError("Por favor, completa todos los campos.");
            return;
        }

        try {
            const response = await fetch("../view/index.php?controller=Usuario&action=registrar", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ nombre, email, password, direccion }), 
            });

            if (!response.ok) {
                const errorData = await response.json();
                mostrarError(errorData.message || "Error al registrar el usuario.");
                return;
            }

            alert("Registro exitoso. Puedes iniciar sesión ahora.");
            window.location.href = "login.php"; // Redirige al login
        } catch (error) {
            mostrarError("Error en la conexión: " + error.message);
        }
    });

    function mostrarError(message) {
        errorMessageDiv.textContent = message;
        errorMessageDiv.classList.remove("hidden");
    }
});
