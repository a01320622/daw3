<?php
				session_start();
				include_once('connection.php');
				$articuloId=$_GET['a'];
				//$userId=$_SESSION["fbid"];	
				//$mail=$_SESSION["mail"];
				//echo "mail:".$mail;

				
				
				$query = "SELECT `Articulo`.`usuarioId`,`Articulo`.`nombre`,`Articulo`.`vendido`, `Articulo`.`estadoArticulo`,`Articulo`.`precio`,`Articulo`.`descripcion`, `Articulo`.`calle`, `Estados`.`nombre` AS Estado, `Articulo`.`cuidad`, `Articulo`.`codigoPostal` 
				FROM Articulo, Estados WHERE `Articulo`.`state` = `Estados`.`estadoId` AND `Articulo`.`articuloId`=".$articuloId." ORDER BY `Articulo`.`vendido` ASC" ;
				
				
				//echo "quesry:".$getMail;

		        $result = mysqli_query($connection,$query);
		        

		        while($row = mysqli_fetch_array($result)) {
		        	$user=$row['usuarioId'];
		        	$getMail="SELECT email FROM usuarios WHERE fbId=".$user;
		        	$resultMail = mysqli_query($connection,$getMail);

		        	while($rowMail = mysqli_fetch_array($resultMail)) {
		        	$mail = $rowMail['email'];
		        }
		        
		        	echo "<h2>" . $row['nombre'] . "</h2>";
		          
		          echo "<h3> Estado del articulo:</h3>" . $row['estadoArticulo']."<br>";
		          echo "<h3> Precio:</h3>  $" . $row['precio']."   MXN<br>";
		          echo "<h3>Descripción:</h3>".$row['descripcion']."<br>";
		          echo "<h3>Ubicación:</h3>" . $row['calle'] . ", ".$row['cuidad']. ",". $row['Estado']." C.P: ".$row['codigoPostal'];
		          
		          $direcc= $row['calle'].",".$row['cuidad'].",".$row['Estado'].",México";
		          // echo "<p>".$direcc."</p>";
		          echo "<br><br><br><iframe
	  						width=\"750\"
	  						height=\"500\"
							frameborder=\"0\" style=\"border:0\"
							src=\"https://www.google.com/maps/embed/v1/search?key=AIzaSyCgpoQUbukp62MU1dzkpglRN6bd1e_ZYW0&q=".$direcc."\">
						</iframe><br>";
					echo "<br><br><br><br><br><a class=\"pure-button pure-button-primary\" id=\"email\" href=\"mailto:".$mail."?Subject=".$row['nombre']."  $".$row['precio']." MXN\" >Contactá vendedor</a><br><br><br><br><br>";
					//href=\"mailto:".$mail."?subject=".$row['nombre']."\"
		          
		        }

		    



?>