<?php  
session_start();


if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: ../../../Cuenta/Vista/iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){
	include '../../Conexion/Conexion.php';
		$id = $_GET['id'];

		$sentencia = $bd->prepare("SELECT * FROM persona WHERE NumerodeDocumento = ?;");
		$sentencia->execute([$id]);
		$persona1 = $sentencia->fetch(PDO::FETCH_OBJ);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Empleado</title>
	  <meta charset="utf-8">
	  <link rel="stylesheet" href="../CSS/estilos.css">
	  <link rel="stylesheet" href="../CSS/empleado.css">
  	<link rel="stylesheet" href="../../CuentaAdmi/CSS/index.css">
  	<link rel="stylesheet" href="../../CuentaAdmi/CSS/perfil.css">
</head>
<body>


    <!-- MENU -->
  
	<section id="header">
    <div class="header">
      
        <div class="brand">
          <a href="../../CuentaAdmi/Vista/inicio.php">
            <img src="../../../imgindex/logo.png" alt="">
          </a>
        </div>
      <div class="nav-bar">
        
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="../../CuentaAdmi/Vista/inicio.php" data-after="Inicio">Inicio</a></li>
            <li><a href="" data-after="Ayuda">Buzon de Ayuda</a></li>
            <li><a href="../index.php" data-after="Productos">Empleados</a></li>
          </ul>
        </div>

            <div class="dropdown">
            
              <input  type="buttom" onclick="myFunction()" class="dropbtn" style="background-image:url('https://img.icons8.com/ios-filled/50/000000/cat-profile.png')">
              <span class="caret"></span>
              <div id="myDropdown" class="dropdown-content">
                <form action="../../CuentaAdmi/Vista/listar.php" method="POST"><input class="perfil" type="submit" value="Perfil" name="btn2"></form>
                <a href="../../Categorias/index.php">Categorias</a>
                <a href="">Productos</a>
                <a href="">Formas de Pago</a>
                <a href="../../Proveedores/index.php" class="historial">Proveedores</a>
                <a class="" href="">Facturas</a>
                <a class="salir" href="../../../Cuenta/Controlador/CerrarSesion.php">Salir</a>
              </div>
            </div>

      </div>
    </div>
  </section>

  <!-- FIN DE MENU -->



  <!-- Registrar -->
<div class="div__firmts">
  <center>
    <h3>Editar Empleado:</h3>
    <form class="form" method="POST" action="../Controlador/editarProceso.php">
    <table class="form__items">
		

			<tr>
				<td>Telefono: </td>
				<td><input type="text" name="Telefono2" minlength="10" maxlength="10" value="<?php echo $persona1->Telefono; ?>"></td>
			</tr>

      <tr>
				<td>Email: </td>
				<td><input type="text" name="CorreoElectronico2" pattern=".+@.+.com" placeholder="ejemplo@gmail.com" value="<?php echo $persona1->CorreoElectronico; ?>"></td>
			</tr>


      <tr>
				<td>Contraseña: </td>
				<td><input type="password" name="Contrasena2" value=""></td>
			</tr>



			<tr>
                    <input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona1->NumerodeDocumento ;?>">
					<td colspan="2"><input type="submit" value="Aceptar"></td>
			</tr>
		</table>
	</form>
    </center>
</div>


	<script src="../../../indexJava/app.js"></script> 
	<script src="../../CuentaAdmi/Java/index.js"></script>
</body>
</html>