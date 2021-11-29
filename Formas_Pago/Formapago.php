<?php

require("../../FRUVER_MCP/Cuenta/Conexion/Conexion.php");
//require("../indexPortada.php");//

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formas de Pago</title>
    <link rel="stylesheet" href="../Formas_Pago/css/estilospagos.css">
</head>
<body>
    <section id="header">
        <div class="header">
            <div class="brand">
                <a href="../indexPortada.php">
                    <img src="../imgindex/logo.png" alt="" class="brand">
                </a>
            </div>
            <div class="nav-bar">
                <div class="nav-list">
                <div class="hamburger">
                <div class="bar"></div>
            </div>
            <ul>
                <li><a href="#" data-after="Inicio">Inicio</a></li>
                <li><a href="#services" data-after="Informacion">Informacion</a></li>
                <li><a href="#about" data-after="Productos">Productos</a></li>
                <li><a href="#contact" data-after="Contactos">Contactos</a></li>
                <li><a href="Cuenta/Vista/iniciarsesion.php" data-after="Inicio sesion/Registrarse">Inicio sesion/Registrarse</a></li>
            </ul>
            </div>
            </div>
        </div>
    </section>
    <br> <br> <br> <br> <br> <br> <br> <br>
    <div class="Titulo">
        <h1><center>SELECCIONE METODO DE PAGO</center></h1>
    </div>
    <div class="metodopago">
        <a href="tarjeta_credito.php"><img src="../Formas_Pago/img/tarjeta_credito.png" alt="MDN" class="img"></a>
        <br><br><br>
        <h3 class="metodo">Tarjeta de Credito</h3>
    </div>
    <div class="metodopago">
        <a href="tarjeta_debito.php"><img src="../Formas_Pago/img/tarjeta_debito.png" alt="MDN" class="img"></a>
        <h3 class="metodo1">Tarjeta Debito</h3>
    </div>
    <div class="metodopago">
        <a href="efecty.php"><img src="../Formas_Pago/img/efecty.png" alt="MDN" class="img"></a>
        <h3 class="metodo2">Punto de Efecty</h3>
    </div>
    <div class="metodopago">
        <a href="contrareembolso.php"><img src="../Formas_Pago/img/contrareembolso.png" alt="MDN" class="img"></a>
        <h3 class="metodo3">Contra Reembolso</h3>
    </div>
</body>
</html>