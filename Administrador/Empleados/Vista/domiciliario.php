<?php  

session_start();

$id = $_GET['id'];

if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: ../../../Cuenta/Vista/iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){
  include '../../Conexion/Conexion.php';

	
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="../../CuentaAdmi/CSS/index.css">
  	<link rel="stylesheet" href="../CSS/vendedor.css">
	  <link rel="stylesheet" href="../CSS/estilos.css">
  	<link rel="stylesheet" href="../../CuentaAdmi/CSS/perfil.css">
    <title>Datos Complementarios</title>
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


<center>
<!-- Insertar Nuevo Empleado -->


<section id="contenedor_vendedor">

<form class="form_vendedor" method="POST" action="../Controlador/insertarDomiciliario.php?id=<?php echo $id; ?>">

<h3 class="Text_center">Datos Domiciliario</h3>


    <table id="table_vendedor">
        <tr>
            <td>Numero de Documento: </td>
            <td><input type="text" name="txtNumerodeDocumento" value="<?php echo $id; ?>"> </td>
        </tr>

        <tr>
            <td>Carnet de Trabajo: </td>
            <td><input type="text" name="txtCarnetdeTrabajo" placeholder="Carnet de Trabajo" required></td>
        </tr>


        <tr>
            <td>Numero Seguro Dom: </td>
            <td><input type="text" name="txtNumeroSeguroDom" required></td>
        </tr>


        <tr>
            <td>Numero Seguro Vehi: </td>
            <td><input type="text" name="txtNumeroSeguroVehi" required></td>
        </tr>



        <tr>
            <td>Valor Domicilio: </td>
            <td><input type="text" name="txtValorDomicilio" required></td>
        </tr>


        <input type="hidden" name="oculto" value="1">


        <tr>
            <td><input type="reset" name=""></td>
            <td><input type="submit" name="Enviar" value="Registrarse"></td>
        </tr>
    </table>
</form>
</section>
<!-- Insertar Nuevo Empleado FIN -->




</center>



  	<script src="../../../indexJava/app.js"></script> 
	<script src="../../CuentaAdmi/Java/index.js"></script>
</body>
</html>