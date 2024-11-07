<?php
session_start();
include "db.php";
if (isset($_GET['token'])) {
    $RecToken = $_GET['token'];

    // Depuración: Mostrar el token recibido
    // echo "Token recibido: " . htmlspecialchars($token_recibido) . "<br>"; // Descomentar para depuración

    // Asegúrate de que la variable de sesión "token" esté establecida
    if (isset($_SESSION['token'])) {
        // Depuración: Mostrar el token de la sesión
        //echo "Token en sesión: " . htmlspecialchars($_SESSION['token']) . "<br>"; // Descomentar para depuración
        if ($RecToken === $_SESSION['token']) {
            // Asegúrate de que la variable de sesión "correo" esté establecida
            if (isset($_SESSION['email'])) {
                $correo = $_SESSION['email'];

                // Cambiar el estado del usuario
                $sql = "UPDATE usuarios SET ID_Estado = 1 WHERE Email = ?";
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("s", $correo);
                    if ($stmt->execute()) {
                        echo "Tu cuenta ha sido verificada y habilitada.<br>";
                        
                        // Botón para ir a login.html
                        echo '<a href="../login.html"><button style="padding: 10px 15px; font-size: 16px;">Ir a Login</button></a>';
                        
                        // Limpiar la sesión si deseas
                        session_unset(); // Esto elimina todas las variables de sesión
                        session_destroy(); // Esto destruye la sesión
                    } else {
                        echo "Error al habilitar la cuenta: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error al preparar la consulta: " . $conn->error;
                }
            } else {
                echo "No se encontró el correo del usuario en la sesión.";
            }
        } else {
            echo "Token no válido o no se proporcionó.";
        }
    } else {
        echo "No se ha establecido el token en la sesión.";
    }
} else {
    echo "No se ha proporcionado un token.";
}
?>