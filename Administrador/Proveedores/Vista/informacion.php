<?php  

session_start();

$id = $_GET['id'];

if (!isset($_SESSION['NumerodeDocumento'])) {

	header('Location: ../../../Cuenta/Vista/iniciarsesion.php');

}elseif(isset($_SESSION['NumerodeDocumento'])){


		include '../../Conexion/Conexion.php';
		$sentencia = $bd->query("SELECT * FROM persona INNER JOIN roles ON persona.id_rol = roles.Id INNER JOIN proveedores ON persona.NumerodeDocumento = proveedores.NumerodeDocumento WHERE persona.NumerodeDocumento = $id;");
		$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($productos);
	
}
				foreach ($usuarios as $dato) {
                    
			
                    
	
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
  	<link rel="stylesheet" href="../../Categorias/CSS/links.css">
    <title>Datos Empleado</title>
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
<center><h3><?php echo $dato->Nombres; ?></h3></center>

<section class="acciones">
    <a id="links" href="../index.php">Ver Proveedores</a>
    <a id="modificar" href="editar.php?id=<?php echo $dato->NumerodeDocumento; ?>">Editar</a>
    <a class="eliminar" href="../Controlador/eliminar.php?id=<?php echo $dato->NumerodeDocumento; ?>">Eliminar</a>
</section>


    <table class="table__1">

		<tbody class="empleado_contenido">

			<tr>
				<td class="titulo_empleado">Nombres</td>
                <td><?php echo $dato->Nombres; ?></td>
			</tr>


            <tr>
                <td class="titulo_empleado">Apellidos</td>
                <td><?php echo $dato->Apellidos; ?></td>
            </tr>


            <tr>
                <td class="titulo_empleado">Tipo de Documento</td>
                <td><?php echo $dato->TipodeDocumento; ?></td>
            </tr>

            <tr>
                <td class="titulo_empleado">Numero de Documento</td>
                <td><?php echo $dato->NumerodeDocumento; ?></td>
            </tr>

            <tr>
                <td class="titulo_empleado">Telefono</td>
                <td><?php echo $dato->Telefono; ?></td>
            </tr>


            <tr>
                <td class="titulo_empleado">Correo Electronico</td>
                <td><?php echo $dato->CorreoElectronico; ?></td>
            </tr>


            <tr>
                <td class="titulo_empleado">Sexo</td>
                <td><?php echo $dato->Sexo; ?></td>
            </tr>

            <tr>
                <td class="titulo_empleado">Contraseña</td>
                <td>--------</td>
            </tr>


            <tr>
                <td class="titulo_empleado">Rol</td>
                <td><?php echo $dato->Rol; ?></td>
            </tr>


            <tr>
                <td class="titulo_empleado">Nit Proveedor </td>
                <td><?php echo $dato->NitProveedor; ?></td>
            </tr>
            
            
            <tr>
                <td class="titulo_empleado">Ciudad </td>
                <td><?php echo $dato->Ciudad; ?></td>
            </tr>
            

        </tbody>

				    
					<?php
				}
			?>
    </table>
</div>
<!-- Mostrar FIN -->

    
        <script src="../../../indexJava/app.js"></script> 
	<script src="../../CuentaAdmi/Java/index.js"></script>
</body>
</html>