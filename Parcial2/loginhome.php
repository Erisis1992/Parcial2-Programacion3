<?php
session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
    header("Location: ./login.html");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="home">
            <a href="./index.html"><img id="hIcon" src="./imgs/home.svg" alt="Home" ></a>
        </div>
        <div class="title">
            <h1>Parcial 2 de Programación 3</h1>
        </div>
        <div class="icons">
        <?php echo "<p>$_SESSION[email]</p>"?>
        <a href="./Api2/unsession.php"><button>Cerrar sesion</button></a>
        </div>
    </header>
    <div class="medium">
        <div class="card">
            <h4>Cambiar contraseña</h4>
            <div>
                <a href="./passchange.php"><button>Cambiar contraseña</button></a>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?render=6LcLe3UqAAAAAECfGldQHBjt-tf7D0pI0sUD-NEi"></script>
    <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LcLe3UqAAAAAECfGldQHBjt-tf7D0pI0sUD-NEi', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              fetch("./Api2/validarlogin.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                 // Display the response in an HTML element (for example, a <div> with id "response")
                    document.getElementById("response").innerHTML = data;
                 })
                .catch(error => {
                     console.error("Error:", error);
                });
            });
        });
      }
  </script>
</body>
</html>