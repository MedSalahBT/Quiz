<?php
		session_start();	
?>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	
	<title>Authentification</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	
	
</head>
<body>

	<section class="container">
			<section class="login-form">
			
				<form name="form1" method="post" >
				
                        
                        
					
					<img src="assets/images/logo.png" class="img-fluid" alt="Responsive image" />
					
					Nom Utilisateur : <input type="text" name="nom" placeholder="Name" required class="form-control input-lg" />
					
					Email : <input type="text" name="email" placeholder="Email" required class="form-control input-lg" />
					
					<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
					
					<?php
							$_SESSION['con'] = 'false'; 
							$_SESSION['utilisateur'] = ''; 
							
							include 'ConnexionDB.php'; 
							$echec = 'true';
	 						if(isset($_POST["nom"])!='' && isset($_POST["email"])!='')
							{
								$auth = $mysqli->query('SELECT * FROM Authentification');
								while($data = mysqli_fetch_array($auth)){
									if($data['Email'] == $_POST["email"]){  
										$_SESSION['id_User'] = $data['Id'];
										$_SESSION['utilisateur'] = $data['Nom'];
										$_SESSION['email'] = $data['Email'];
										$_SESSION['con'] = 'true';
										$_SESSION['admin']= $data['Admin'];
										if($_SESSION['admin']==0){
											echo "<script type='text/javascript'>window.location='share_interface.php';</script>";
										}
										else{
											echo "<script type='text/javascript'>window.location='admin.php';</script>";
										}
										
										break;
									}	
									else
										$echec = 'false';
								}
								if($echec=='false')
									echo'<label  align="center" style="color:Red">Nom  ou Email INCORRECTE</label>';
							}
							mysqli_close($mysqli);
					?>
					<div>
					
						<a href="sign_up.php"> Create account</a>
						
					</div>

				</form>
				
				
			</section>
	</section>
	
	<!-- Latest compiled and minified CSS --> 
	<script src="//code.jquery.com/jquery-3.2.1.min.js"> </script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>