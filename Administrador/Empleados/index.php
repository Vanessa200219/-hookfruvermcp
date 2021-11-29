<?php  

session_start();


if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: ../../Cuenta/Vista/iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){

		include '../Conexion/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM persona INNER JOIN roles ON persona.id_rol = roles.Id WHERE id_rol IN (3,5);");
		// $sentencia = $bd->query("SELECT * FROM persona WHERE id_rol IN (3,5);");
		$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($productos);
	
}
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Empledos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/estilos.css">
	<link rel="stylesheet" href="CSS/buscador.css">
  	<link rel="stylesheet" href="../CuentaAdmi/CSS/index.css">
  	<link rel="stylesheet" href="../CuentaAdmi/CSS/perfil.css">
</head>
<body>

  <!-- MENU -->
  
  <section id="header">
    <div class="header">
      
        <div class="brand">
          <a href="../CuentaAdmi/Vista/inicio.php">
            <img src="../../imgindex/logo.png" alt="">
          </a>
        </div>
      <div class="nav-bar">
        
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="../CuentaAdmi/Vista/inicio.php" data-after="Inicio">Inicio</a></li>
            <li><a href="" data-after="Ayuda">Buzon de Ayuda</a></li>
            <li><a href="index.php" data-after="Productos">Empleados</a></li>
          </ul>
        </div>

            <div class="dropdown">
            
              <input  type="buttom" onclick="myFunction()" class="dropbtn" style="background-image:url('https://img.icons8.com/ios-filled/50/000000/cat-profile.png')">
              <span class="caret"></span>
              <div id="myDropdown" class="dropdown-content">
                <form action="../CuentaAdmi/Vista/listar.php" method="POST"><input class="perfil" type="submit" value="Perfil" name="btn2"></form>
                <a href="../Categorias/index.php">Categorias</a>
                <a href="">Productos</a>
                <a href="">Formas de Pago</a>
                <a href="../Proveedores/index.php" class="historial">Proveedores</a>
                <a class="" href="">Facturas</a>
                <a class="salir" href="../../Cuenta/Controlador/CerrarSesion.php">Salir</a>
              </div>
            </div>

      </div>
    </div>
  </section>

  <!-- FIN DE MENU -->


<center>


		<!-- Mostrar Empleados -->
<div class="div__firmts">
	<a href="#form" class="empleado">Nuevo Empleado</a>
		<!-- Buscador -->

			<section class="buscador">
				<div >
					<form class="buscar" action="" method="get">
						<a href="index.php"><img id="BuscarImg" src="https://img.icons8.com/ios/50/000000/search-property.png"/></a>
						<input id="Buscar" type="text" name="Busqueda" placeholder="Buscar Empleado" required>
						<input id="Buscar1" type="submit" name="Buscar" value="Buscar">
					</form>
				</div>
			</section>

			<?php

				if (isset($_GET['Buscar'])) {
					$busqueda = $_GET['Busqueda'];


					$sentencia = $bd->query("SELECT * FROM persona INNER JOIN roles ON persona.id_rol = roles.Id WHERE NumerodeDocumento LIKE '%$busqueda%' AND id_rol IN (3,5);");
					$sentencia->execute();

					if ($busqueda == 0) { ?>
						
					 	<div class="no_existe"><?php echo "No existe este dato"; ?></div>	
					<?php	 
					}



					while ($dato = $sentencia->fetch()) { 
						
					?>
							
					<table class="table__1">

						<tr class="content">
							<td><?php 	echo $dato['Nombres']; ?></td>
							<td><?php echo $dato['Apellidos']; ?></td>
							<td><?php echo $dato['NumerodeDocumento']; ?></td>
							<td><?php echo $dato['Rol']; ?></td>
							<td><a class="editar" href="Controlador/rolempleado.php?id=<?php echo $dato['NumerodeDocumento']; ?>">Ver más</a></td>
						</tr>
			
					</table>

					<?php
					
					}
				}

					?>

		<!-- Buscador Fin -->



		<h3>Empleados</h3>
		<table class="table__1">
				<tbody>
					<tr class="td__tittle">
						<td>Nombres</td>
						<td>Apellidos</td>
						<td>Numero de Documento</td>
                		<td>ID Rol</td>
						<td>Empleados</td>
					</tr>
				</tbody>

			<?php 
				foreach ($usuarios as $dato) {
			?>
					<tr class="content">
						<td><?php echo $dato->Nombres; ?></td>
						<td><?php echo $dato->Apellidos; ?></td>
						<td><?php echo $dato->NumerodeDocumento; ?></td>
						<td><?php echo $dato->Rol; ?></td>
						<td><a class="editar" href="Controlador/rolempleado.php?id=<?php echo $dato->NumerodeDocumento; ?>">Ver más</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>
	</div>
		<!-- Mostrar Empleados FIN -->


		<!-- Insertar Nuevo Empleado -->
		
		<h3>Nuevo Empleado:</h3>

		<form id="form" class="form" method="POST" action="Controlador/insertar.php">
			<table class="form__items">
            	<tr>
					<td>Nombre: </td>
					<td><input type="text" name="txtNombres" placeholder="Nombres" required></td>
				</tr>

		    	<tr>
			    	<td>Apellido: </td>
					<td><input type="text" name="txtApellidos" placeholder="Apellidos" required></td>
				</tr>


				<tr>
					<td>Tipo de Documento: </td>
				  	<td>
            			<select name="txtTipodeDocumento" id="" required>
					    	<option value=""></option>
					    	<option value="1">C.C</option>
					    	<option value="3">C.E</option>
				    	</select>
                	</td>
				</tr>


				<tr>
					<td>Numero de Documento: </td>
					<td><input type="text" name="txtNumerodeDocumento" minlength="7" maxlength="10" placeholder="Numero de Documento" required></td>
				</tr>


				<tr>
					<td>Telefono: </td>
					<td><input type="text" name="txtTelefono" minlength="10" maxlength="10" required></td>
				</tr>


            	<tr>
					<td>Email: </td>
					<td><input type="text" name="txtCorreoElectronico" pattern=".+@.+.com" placeholder="ejemplo@gmail.com" required></td>
				</tr>


            	<tr>
				 	<td>Sexo: </td>
				 	<td>
						<select name="txtSexo" id="" required>
					   		<option value=""></option>
					   		<option value="1">F</option>
					   		<option value="2">M</option>
				      	</select>
                	</td>
				</tr>



            	<tr>
					<td>Contraseña: </td>
					<td><input type="password" name="txtContrasena"></td>
				</tr>


            	<tr>
				 	<td>ID Rol: </td>
				 	<td>
						<select name="txtRol" id="" required>
							<option value=""></option>
							<option value="3">Vendedores</option>
					   		<option value="5">Domiciliarios</option>
				      	</select>
                	</td>
				</tr>



				<input type="hidden" name="oculto" value="1">


				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" name="Enviar" value="Registrarse"></td>
				</tr>
			</table>
		</form>
		<!-- Insertar Nuevo Empleado FIN -->


		

</center>


	<script src="../../indexJava/app.js"></script> 
	<script src="../CuentaAdmi/Java/index.js"></script>
</body>
</html>