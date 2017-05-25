
<?php 
	session_start();
	
	
	$_SESSION['newTry'] = 1;
?>

<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	
	<title>The Quiz Game</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	
	
</head>
<body>

	<section class="container">
			<section class="share-form">
	
					<div class="btn-group-vertical">
					
						<h1 style="color:#1370DB"> -WELCOME <?php echo $_SESSION['utilisateur']; ?> -</h1>
					
					&nbsp;
					<img src="assets/images/quiz_challenge.png" class="img-fluid" alt="Responsive image" />
					
					<button type="button" onclick="document.location.href='play.php';"  class="btn btn-primary">Let's get started</button>
					&nbsp;
					
					<button type="button" class="btn btn-warning  onclick="document.location.href='index.php';" ">Disconnect</button>
					
					
					&nbsp;
					
						<font color="#1066CA">
						Today's date is : 
						<strong>
						 <span id="time"></span>
						</strong>           
						</font>
						
						<script type="text/javascript">
						var today = new Date();
						document.getElementById('time').innerHTML=today;
						</script>
						
						&nbsp;
					    &nbsp;
						</div>
								
			</section>
	</section>
	
	<!-- Latest compiled and minified CSS --> 
	<script src="//code.jquery.com/jquery-3.2.1.min.js"> </script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>