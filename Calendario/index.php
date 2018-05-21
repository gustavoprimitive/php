<html>
	<head>
		<title>Calendario de reservas</title>
	</head>
	<body>
		<div align="center">
		
		<form method="POST" action="cal_action.php">
		
		<?php	
			//Inicializacion de variable para almacenar el ultimo dia de mes
			$domingo = 0;
			
			//Lectura de fichero plano y recuento de lineas para recorrerlo despues
			$fichero = file('calendario.txt');
			$lineas = count($fichero); 

			//Se dibuja la cabecera de las columnas
			echo '<br><br>';
			echo '<table border="0" bordercolor="#FFCC00" style="background-color:" width="30%" cellpadding="1" cellspacing="1">';
			echo '<tr>';
				echo '<td>L</td>';
				echo '<td>M</td>';
				echo '<td>X</td>';
				echo '<td>J</td>';
				echo '<td>V</td>';
				echo '<td>S</td>';
				echo '<td>D</td>';
			
			//Primer bucle para las filas
			for ( $i = 1 ; $i <= 5 ; $i++ )
			{
				//Segundo bucle para las columnas
				echo '<tr>';
				for ( $j = 1 ; $j <= 7 ; $j++ )
				{
					//Calculo de numero de dia
					$dia[$j] = $j + $domingo;
					
					if ( $dia[$j] < 32 )
					{
						//Inicializacion de flag de color
						$flag = 0;
						//Tercer bucle para comprobar si el dia existe en el fichero plano
						for ( $k = 0 ; $k < $lineas; $k++ )
						{	 
							//Si el dia existe se asigna color amarillo, en caso contrario, rojo
							if ( $dia[$j] == $fichero[$k] )
							{
								$flag = 1;
							}
							if ($flag == 1)
								$color = 'yellow';
							else
								$color = 'red';
						}
					//Definicion de objeto. Recoge el color y el numero de dia. Para usuario consulta disabled=true
					echo '<td><input type="submit" style="display:block; width:50px; background-color:'.$color.'" name="dia" value="'.$dia[$j].'"></td>';
					}
					else
						echo "";
				}
			//Obtencion de ultimo dia de la semana
			$domingo = $domingo + $j - 1;
			}
			echo '</table>';
		?>
		</div>
		</form>
	</body>
</html>
	