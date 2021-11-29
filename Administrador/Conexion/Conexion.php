<?php  
	$contrasena = 'FruverMCP123';
	$usuario = 'u991668360_fruvermcp';
	// $port= '3306';
	$nombrebd= 'u991668360_fruvermcp';
	

	try {
		$bd = new PDO('mysql:host=sql437.main-hosting.eu;port=3306;dbname='.$nombrebd,$usuario,$contrasena,
			
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
	} catch (Exception $e) {
		echo "Error de conexión ".$e->getMessage();
	}

?>