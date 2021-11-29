<?php  

session_start();


if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){
	include '../Conexion/Conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM persona WHERE NumerodeDocumento = ?;");
		$sentencia->execute([$id]);
		$persona1 = $sentencia->fetch(PDO::FETCH_OBJ);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSCuenta/index.css">
    <link rel="stylesheet" href="../CSSCuenta/perfil.css">
    <link rel="stylesheet" href="../CSSCuenta/informacion.css">
    <title>Modificacion Informacion</title>
</head>
<body>
    
  <!-- MENU -->
  
  <section id="header">
    <div class="header">
      
        <div class="brand">
          <a href="inicio.php">
            <img src="../../imgindex/logo.png" alt="">
          </a>
        </div>
      <div class="nav-bar">
        
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="inicio.php" data-after="Inicio">Inicio</a></li>
            <li><a href="Ayuda.php" data-after="Ayuda">Ayuda</a></li>
            <li><a href="" data-after="Productos">Productos</a></li>
          </ul>
        </div>

            <div class="dropdown">
            
              <input  type="buttom" onclick="myFunction()" class="dropbtn" style="background-image:url('https://img.icons8.com/ios-filled/50/000000/cat-profile.png')">
              <span class="caret"></span>
              <div id="myDropdown" class="dropdown-content">
                <form action="../Vista/Listar.php" method="POST"><input class="perfil" type="submit" value="Perfil" name="btn2"></form>
                <a href="">Mis Compras</a>
                <a href="">Favoritos</a>
                <a href="">Privacidad</a>
                <a href="" class="historial">Notificaciones</a>
                <a class="" href="inicio.php #contact">Contactos</a>
                <a class="salir" href="../Controlador/CerrarSesion.php">Salir</a>
              </div>
            </div>

      </div>
    </div>
  </section>

  <!-- FIN DE MENU -->  


  <!-- Editar Datos -->
<section class="modulo_editar">


    <div class="texto">
      <h6>Modificar Perfil</h6>
    </div>

    <form class="form" method="POST" action="../Controlador/editarProceso.php">

        <table class="form__items">

			    <tr>
				    <td class="editar_items">Nombre: </td>
				    <td id="campo_items"><input type="text" name="Nombres2" placeholder="Nombres" value="<?php echo $persona1->Nombres; ?>"></td>
			    </tr>

		      <tr>
			      <td class="editar_items">Apellido: </td>
				    <td><input type="text" name="Apellidos2" placeholder="Apellidos" value="<?php echo $persona1->Apellidos; ?>"></td>
			    </tr>

			    <tr>
				    <td class="editar_items">Telefono: </td>
				    <td><input type="text" name="Telefono2" minlength="10" maxlength="10" value="<?php echo $persona1->Telefono; ?>"></td>
			    </tr>

          <tr>
				    <td class="editar_items">Email: </td>
				    <td><input type="text" name="CorreoElectronico2" pattern=".+@.+.com" placeholder="ejemplo@gmail.com" value="<?php echo $persona1->CorreoElectronico; ?>"></td>
			    </tr>

      



			    <tr >
            <input type="hidden" name="oculto">
					  <input type="hidden" name="id2" value="<?php echo $persona1->NumerodeDocumento ;?>">
					  <td><input id="submit" type="submit" value="Aceptar"></td>
			  </tr>
		  </table>
	  </form>

</section>
  


  <!-- FOOTER -->
  <section id="footer">

    <div class="footer container">

      <div class="years">
        <h1>2021</h1>
      </div>

      <h2>SITIO WEB</h2>

      <div class="social-icon">

        <div class="social-item">
          <a href="https://www.facebook.com/profile.php?id=100074625857357"><img src="https://img.icons8.com/ios/50/4a90e2/facebook-new.png"/></a>
        </div>

        <div class="social-item">
          <a href="https://www.instagram.com/frucer_mcp/"><img src="https://img.icons8.com/ios/50/fa314a/instagram-new.png"/></a>
        </div>

        <div class="social-item">
          <a href="https://twitter.com/FruverMcp"><img src="https://img.icons8.com/ios/50/4a90e2/twitter--v1.png"/></a>
        </div>

        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/ios/50/26e07f/whatsapp.png"/></a>
        </div>
      
  </section>
  <!-- FIN FOOTER -->

  <script src="../../indexJava/app.js"></script>
  
	
	<script src="../java/index.js"></script>
</body>
</html>
