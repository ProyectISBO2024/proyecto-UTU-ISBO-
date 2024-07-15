    // Manejar registro en registrarse.html
    if (registerButton) {
        registerButton.addEventListener('click', function() {
            const username = document.getElementById('name').value;
            const mail = document.getElementById('mail').value;
            const password = document.getElementById('contraseña').value;
            const confirmPassword = document.getElementById('contraseñaEX').value;

            // Validación simple
            if (username && mail && password && confirmPassword) {
                if (password === confirmPassword) {
                    // Enviar datos al servidor
                    fetch('register.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ username: username, mail: mail, password: password })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Registro exitoso');
                            window.location.href = 'iniciar_sesion.html';
                        } else {
                            alert('Error en el registro: ' + data.message);
                        }
                    });
                } else {
                    alert('Las contraseñas no coinciden.');
                }
            } else {
                alert('Por favor, complete todos los campos.');
            }
        });
    }