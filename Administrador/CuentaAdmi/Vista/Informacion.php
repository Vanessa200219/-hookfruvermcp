<?php
session_start();
$usu = $_SESSION['NumerodeDocumento'];


	if (!isset($_SESSION['NumerodeDocumento'])) {

		header('Location: ../Vista/iniciarsesion.php');
    
    }elseif(isset($_SESSION['NumerodeDocumento'])){
        
		include_once( '../../Conexion/Conexion.php');
			
		    $statement = $bd->prepare("SELECT * FROM persona WHERE NumerodeDocumento = $usu");
	        $statement->execute();
            
	        //print_r($datos); 
            
    
            
            while ($key=$statement->fetch()) {
            

            ?>






<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/index.css">
  <link rel="stylesheet" href="../CSS/perfil.css">
  <link rel="stylesheet" href="../CSS/informacion.css">
  <title><?php echo $_SESSION['Nombres'] ?></title>
</head>

<body>



  <!-- MENU -->
  
  <section id="header">
    <div class="header">
      
        <div class="brand">
          <a href="inicio.php">
            <img src="../../../imgindex/logo.png" alt="">
          </a>
        </div>
      <div class="nav-bar">
        
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="../Vista/inicio.php" data-after="Inicio">Inicio</a></li>
            <li><a href="" data-after="Ayuda">Buzon de Ayuda</a></li>
            <li><a href="../../Empleados/" data-after="Productos">Empleados</a></li>
          </ul>
        </div>

            <div class="dropdown">
            
              <input  type="buttom" onclick="myFunction()" class="dropbtn" style="background-image:url('https://img.icons8.com/ios-filled/50/000000/cat-profile.png')">
              <span class="caret"></span>
              <div id="myDropdown" class="dropdown-content">
                <form action="listar.php" method="POST"><input class="perfil" type="submit" value="Perfil" name="btn2"></form>
                <a href="../../Categorias/index.php">Categorias</a>
                <a href="">Productos</a>
                <a href="">Formas de Pago</a>
                <a href="../../Proveedores/index.php" class="historial">Proveedores</a>
                <a class="" href="#contact">Facturas</a>
                <a class="salir" href="../../../Cuenta/Controlador/CerrarSesion.php">Salir</a>
              </div>
            </div>

      </div>
    </div>
  </section>

  <!-- FIN DE MENU --> 
    


<section class="contenedor">


<!-- contenedor -->

<section class="conten-text">
	<div class="des_gler">
		<div><a class="editar" href="../Vista/Editar.php?id=<?php echo $key['NumerodeDocumento']; ?>">Editar Perfil</a></div>
		<div><a class="editar" href="../Vista/CambiarContraseña.php?id=<?php echo $key['NumerodeDocumento']; ?>">Seguridad</a></div>
		<div><a href="">Historial</a></div>
		<div><a href="">Configuracion</a></div>
		<div><a href="">1</a></div>
		<div><a href="">2</a></div>
		<div><a href="">3</a></div>
		<div><a href="">4</a></div>
	</div>
</section>

<!-- FIN contenedor -->


	<div class="tittle"><h3 >Informacion Personal</h3></div>

<section class="table">

	<table class="information">
			<tr>
				<td id="label">Nombres </td>
				<td id="input">
					
						<?php echo $key['Nombres']; ?>
					
				</td>
			</tr>


            <tr>
				<td id="label">Apellidos </td>
				<td id="input">
					
						<?php echo $key['Apellidos']; ?>
						
				</td>
			</tr>


            <tr>
				<td id="label">Tipo de Documento </td>
				<td id="input">
					
						<?php echo $key['TipodeDocumento']; ?>
						
				</td>
			</tr>


            <tr>
				<td id="label">Numero de Documento </td>
				<td id="input">
					
						<?php echo $key['NumerodeDocumento']; ?>
						
				</td>
			</tr>


            <tr>
				<td id="label">Telefono </td>
				<td id="input">
					
						<?php echo $key['Telefono']; ?>
					
				</td>
			</tr>


            <tr>
				<td id="label">Correo Electronico </td>
				<td id="input">
					
						<?php echo $key['CorreoElectronico']; ?>
						
				</td>
			</tr>


            <tr>
				<td id="label">Sexo </td>
				<td id="input">
					
						<?php echo $key['Sexo']; ?>
						
				</td>
			</tr>


            <!-- <tr>
			</tr>


            <tr>
					<td><a class="editar" href="../Vista/Editar.php?id=<?php echo $key['NumerodeDocumento']; ?>">Editar Perfil</a></td>
					
			</tr> -->

	</table>


</section>
</section>






            <?php
            }}
            ?>





    
    <script src="../../indexJava/app.js"></script>
	
	<script src="../java/index.js"></script>
</body>
</html>
