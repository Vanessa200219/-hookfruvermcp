<?php  

session_start();

$id = $_GET['id'];

if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: ../../../Cuenta/Vista/iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){


		include '../../Conexion/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM categoria WHERE categoria.CodigoCategoria = $id;");
		$categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
		// print_r($categorias);
	
}
				foreach ($categorias as $dato) {
                    // echo $dato->CodigoCategoria;
                    // echo $dato->Imagen;
                    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" href="../../Empleados/CSS/estilos.css">
	  <link rel="stylesheet" href="../../Empleados/CSS/empleado.css">
  	<link rel="stylesheet" href="../../CuentaAdmi/CSS/index.css">
  	<link rel="stylesheet" href="../../CuentaAdmi/CSS/perfil.css">
  	<link rel="stylesheet" href="../CSS/links.css">
    <title>Informacion</title>
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
            <li><a href="../../Empleados/index.php" data-after="Productos">Empleados</a></li>
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



<div class="div__firmts">
<center><h3><?php echo $dato->NombredeCategoria; ?></h3></center>


<section class="acciones">
  <a id="links" href="../index.php">Ver Categorias</a>
  <a id="modificar" href="editar.php?id=<?php echo $dato->CodigoCategoria; ?>">Editar</a>
  <a class="eliminar" href="../Controlador/eliminar.php?id=<?php echo $dato->CodigoCategoria; ?>">Eliminar</a>
</section>

    <table class="table__1">
	    <tbody class="empleado_contenido">

			<tr>
				<td class="titulo_empleado">Codigo Categoria </td>
                <td><?php echo $dato->CodigoCategoria; ?></td>
			</tr>


            <tr>
                <td class="titulo_empleado">Nombre de Categoria</td>
                <td><?php echo $dato->NombredeCategoria; ?></td>
            </tr>


            <tr>
                <td class="titulo_empleado">Descripcion Categoria</td>
                <td><?php echo $dato->DescripcionCategoria; ?></td>
            </tr>
                    
				</tbody>

				    
					<?php
				}
			?>
			
	</table>
</div>


<script src="../../../indexJava/app.js"></script> 
<script src="../../CuentaAdmi/Java/index.js"></script>
</body>
</html>