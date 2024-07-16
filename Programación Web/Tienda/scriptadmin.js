document.addEventListener('DOMContentLoaded', function() {
    const loginButtonMail = document.getElementById('LoginButtonMail');
    const loginButtonUsuario = document.getElementById('LoginButtonUsuario');

    // Manejar inicio de sesión con correo
    if (loginButtonMail) {
        loginButtonMail.addEventListener('click', function() {
            const adminMail = document.getElementById('Mail').value;

    const validMail = 'admin@mail.com';
    const validUsername = 'admin';

            // Validación simple
          /*  if (adminMail) {
                fetch('adminlogin.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ mail: adminMail })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Inicio de sesión de administrador exitoso');
                        window.location.href = 'adminpanel.html'; 
                    } else {
                        alert('Error en el inicio de sesión de administrador: ' + data.message);
                    }
                });
            } else {
                alert('Por favor, complete todos los campos.');
            }*/
           
                //version temporal
                if (adminMail === validMail) {
                    alert('Inicio de sesión de administrador exitoso');
                    window.location.href = 'adminpanel.html'; 
                } else {
                    alert('Error en el inicio de sesión de administrador: correo incorrecto');
                }
        });
    }

    // Manejar inicio de sesión con usuario
    /*if (loginButtonUsuario) {
        loginButtonUsuario.addEventListener('click', function() {
            const adminUsername = document.getElementById('Usuario').value;

            // Validación simple
            if (adminUsername) {
                fetch('adminlogin.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ username: adminUsername })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Inicio de sesión de administrador exitoso');
                        window.location.href = 'https://www.google.com'; // Redirige a Google
                    } else {
                        alert('Error en el inicio de sesión de administrador: ' + data.message);
                    }
                });
            } else {
                alert('Por favor, complete todos los campos.');
            }
        }*/

            //version temporal
            if (loginButtonUsuario) {
                loginButtonUsuario.addEventListener('click', function() {
                    const adminUsername = document.getElementById('Usuario').value;
        
                    // Validación simple
                    if (adminUsername === validUsername) {
                        alert('Inicio de sesión de administrador exitoso');
                        window.location.href = 'adminpanel.html'; // Redirige al panel de administración
                    } else {
                        alert('Error en el inicio de sesión de administrador: usuario incorrecto');
                    }
                });
            }
});
