<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSSindex/index.css">
	<link rel="stylesheet" href="../CSSCuenta/estilos.css">
    <title>Registrarse</title>
</head>
<body>
    
    <!-- MENU -->
  <section id="header">
    <div class="header">
		<div class="brand">
          <a href="../../index.php">
            <img src="../../imgindex/logo.png" alt="">
          </a>
        </div>
      <div class="nav-bar">
        
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="../../index.php" data-after="Inicio">Inicio</a></li>
            <li><a href="../../index.php#about" data-after="Productos">Productos</a></li>
            <li><a href="../../index.php#contact" data-after="Contactos">Contactos</a></li>
            <li></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- FIN DE MENU -->    


  <!-- Registrar -->
  


  <form class="form" method="POST" action="../Controlador/insertar.php">
  <h3 class="Text_center">REGISTRARSE</h3>
    <table class="form__items">
			<tr>
				<td>Nombre: </td>
				<td><input type="text" name="Nombres" placeholder="Nombres" required="Escriba un nombre"></td>
			</tr>

		  <tr>
			  <td>Apellido: </td>
				<td><input type="text" name="Apellidos" placeholder="Apellidos" required></td>
			</tr>

			<tr>
				<td>Tipo de Documento: </td>
				<td>
            		<select name="TipodeDocumento" id="" required>
					    <option value=""></option>
					    <option value="1">C.C</option>
					    <option value="2">T.I</option>
					    <option value="3">C.E</option>
				    </select>
          		</td>
			</tr>

			<tr>
				<td>Numero de Documento: </td>
				<td><input type="text" name="NumerodeDocumento" minlength="7" maxlength="10" placeholder="Numero de Documento" required></td>
			</tr>

			<tr>
				<td>Telefono: </td>
				<td><input type="text" name="Telefono" pattern="3.+" minlength="10" maxlength="10" required></td>
			</tr>

     		 <tr>
				<td>Email: </td>
				<td><input type="text" name="CorreoElectronico" pattern=".+@.+.com"  placeholder="ejemplo@gmail.com" required></td>
			</tr>

      		<tr>
				<td>Sexo: </td>
				<td>
          			<select name="Sexo" id="" required>
					  <option value=""></option>
					  <option value="1">F</option>
					  <option value="2">M</option>
				  	</select>
        		</td>
			</tr>

      		<tr>
				<td>Contraseña: </td>
				<td><input type="password" name="Contrasena" minlength="4" maxlength="8" required></td>
			</tr>



			<input type="hidden" name="oculto" value="1">


			<tr>
				<td><input type="reset" name=""></td>
				<td><input type="submit" name="Enviar" value="Registrarse"></td>
			</tr>
		</table>
	</form>

  <script src="../../indexJava/app.js"></script>
</body>
</html>