document.addEventListener('DOMContentLoaded', function() {
    const loginButton = document.getElementById('boton');
    const registerButton = document.getElementById('botonRegistro');

    // Manejar inicio de sesión
    if (loginButton) {
        loginButton.addEventListener('click', function() {
            const mail = document.getElementById('Mail').value;
            const password = document.getElementById('Contraseña').value;

            // Validación simple
            if (mail && password) {
                // Aquí puedes agregar más validaciones si es necesario

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

    // Manejar registro
    if (registerButton) {
        registerButton.addEventListener('click', function() {
            const username = document.getElementById('name').value;
            const mail = document.getElementById('mail').value;
            const password = document.getElementById('contraseña').value;
            const confirmPassword = document.getElementById('contraseñaEX').value;

            // Validación simple
            if (username && mail && password && confirmPassword) {
                if (password === confirmPassword) {
                    // Aquí puedes agregar más validaciones si es necesario

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
});
