document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("login-form");
    const errorMessageDiv = document.getElementById("error-message");

    loginForm.addEventListener("submit", async (event) => {
        event.preventDefault(); // Evita el envío normal del formulario

        // Obtén los valores del formulario
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        // Validaciones simples
        if (!email || !password) {
            mostrarError("Por favor, completa todos los campos.");
            return;
        }

        try {
            // Hacer la solicitud fetch al servidor
            const response = await fetch("index.php?controller=Usuario&action=login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ email, password }),
            });

            // Paso 1: Obtener la respuesta como texto en lugar de JSON
            const responseText = await response.text();  // Leer la respuesta como texto

            // Paso 2: Mostrar la respuesta en la consola para depuración
            console.log("Respuesta del servidor:", responseText);  // Ver el contenido de la respuesta

            // Intentamos analizar la respuesta solo si la respuesta es válida
            try {
                const data = JSON.parse(responseText);  // Intentar parsear el JSON
                if (data.success) {
                    alert("Inicio de sesión exitoso.");
                    window.location.href = "tiendausuario.php"; // Redirige a la página principal
                } else {
                    mostrarError(data.message);
                }
            } catch (parseError) {
                // Si no es un JSON válido, mostrar un mensaje de error
                mostrarError("Respuesta inesperada del servidor.");
            }

        } catch (error) {
            mostrarError("Error en la conexión: " + error.message);
        }
    });

    function mostrarError(message) {
        errorMessageDiv.textContent = message;
        errorMessageDiv.classList.remove("hidden");
    }
});

/*document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("login-form");
    const errorMessageDiv = document.getElementById("error-message");

    loginForm.addEventListener("submit", async (event) => {
        event.preventDefault(); // Evita el envío normal del formulario

        // Obtén los valores del formulario
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        // Validaciones simples
        if (!email || !password) {
            mostrarError("Por favor, completa todos los campos.");
            return;
        }

        try {
            const response = await fetch("index.php?controller=Usuario&action=login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ email, password }),
            });

            const responseText = await response.text(); // Obtener como texto

            if (!response.ok) {
                try {
                    const errorData = JSON.parse(responseText); // Intentar parsear como JSON
                    mostrarError(errorData.message || "Error al iniciar sesión.");
                } catch (e) {
                    mostrarError("Error inesperado: " + responseText); // Mostrar el texto como error
                }
                return;
            }

            // Si el inicio de sesión fue exitoso, redirigir a la página de inicio
            const data = JSON.parse(responseText);
            if (data.success) {
                alert("Inicio de sesión exitoso.");
                window.location.href = "tiendausuario.php"; // Redirige a la página principal
            } else {
                mostrarError(data.message);
            }
        } catch (error) {
            mostrarError("Error en la conexión: " + error.message);
        }
    });

    function mostrarError(message) {
        errorMessageDiv.textContent = message;
        errorMessageDiv.classList.remove("hidden");
    }
});
*/