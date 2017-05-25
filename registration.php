<?php
				
				
				require('ConnexionDB.php'); 

				$MyName = $_POST['name'];
				$MyEmail = $_POST['email'];

			
			
				$maxID = mysqli_fetch_array($mysqli->query("select max(Id) from authentification"));
				
				$myid = $maxID[0]+1;
			
				$sql = "INSERT INTO authentification  VALUES ($myid, '$MyName', '$MyEmail', 0)";
			
				$res = $mysqli->query($sql);	
				if($res == 1 ) {echo "<script type='text/javascript'>alert('user has been sucessefully added ! ')</script>";}
				else {echo "<script type='text/javascript'>alert('There is something went wrong while adding the user ! ')</script>";}
				mysqli_close($mysqli);
				
				echo "<script type='text/javascript'>window.location='index.php';</script>";

				
?>					