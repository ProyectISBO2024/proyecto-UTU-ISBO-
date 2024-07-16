document.addEventListener('DOMContentLoaded', function() {
    const loginButton = document.getElementById('boton');
    const registerButton = document.getElementById('botonRegistro');
    const controlAdminLoginButton = document.getElementById('botonControlAdmin'); 
    // Manejar inicio de sesión en iniciar_sesion.html
    if (loginButton) {
        loginButton.addEventListener('click', function() {
            const mail = document.getElementById('Mail').value;
            const password = document.getElementById('Contraseña').value;

            // Validación simple
            if (mail && password) {

                // Enviar datos al servidor
                fetch('login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ mail: mail, password: password })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Inicio de sesión exitoso');
                        window.location.href = 'index.html';
                    } else {
                        alert('Error en el inicio de sesión: ' + data.message);
                    }
                });
            } else {
                alert('Por favor, complete todos los campos.');
            }
        });
    }


    
        });
    ;
