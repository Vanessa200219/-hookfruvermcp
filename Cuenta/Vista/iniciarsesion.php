<?php 
	session_start();
	if (isset($_SESSION['Nombres'])) {
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSCuenta/estilos.css">
    <title>Iniciar Sesion</title>
</head>
<body>


<section class="general">

    <div class="logo">
        <a href="../../index.php">
        <img class="img2" src="../../imgindex/logo.png" alt="">
        </a>
     </div>


     
    <section class="sesion">
        <form class="iniciar" method="POST" action="../Controlador/loginProceso.php">

            <input class="logueo" type="text" name="usuario" placeholder="Correo Electronico" pattern=".+@.+.com" required>
        
            <input class="logueo" type="password" name="contraseña" placeholder="Contraseña" required>

            <input id="enviar" type="submit" value="Iniciar sesión">

            <div class="olvidar"><a  href="">¿Olvidates tu Contraseña?</a></div>

            <div id="crear"><a  role="bottom" href="registrar.php">Crear Cuenta</a></div>
        </form> 
    </section>

</section>


</body>
</html>