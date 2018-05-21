<html>
	<head>
		<title>Calendario de reservas</title>
	</head>
	<body>

		<?php	
			//Array para almacenar el contenido del mes con las modificaciones
			$aux = array();
			
			if (isset($_REQUEST['dia']))
			{
				//Se recoge valor del dia a reservar
				$dia_cambio = $_REQUEST['dia'];
				
				//Lectura de fichero
				$fichero = file('calendario.txt');
				$lineas = count($fichero); 
				
				//Bucle para comparar cada linea del fichero con el dia que se quiere reservar: si coincide se pasa null al fichero
				for($i=0; $i < $lineas; $i++)
				{ 
					if ( $i != $dia_cambio)
					{
						$aux[] = $fichero[$i];
					}
					else
					{	
						if ( $fichero[$i] == 0 )
						{
							$aux[] = $i;
							$aux[] = "\n";
						}
						else
						{
							$aux[] = 0;
							$aux[] = "\n";
						}
					}
				}
			
			//Conversion de array
			$aux = implode($aux, '');
			//Escritura con el cambio en el fichero
			file_put_contents('calendario.txt', $aux);
			
			include('index.php');
			}
		?>
		
	</body>
</html>