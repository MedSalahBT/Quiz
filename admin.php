<?php

if(isset($_POST['desc'])){
	if(!isset($_POST['iscorrect']) || $_POST['iscorrect'] == ""){
		echo "Sorry, important data to submit your question is missing. Please press back in your browser and try again and make sure you select a Id_Question Correct for the question.";
		exit();
	}
	
	require_once("ConnexionDB.php");
	$question = $_POST['desc'];
	$note = $_POST['note'];
	$answer1 = $_POST['answer1'];
	$answer2 = $_POST['answer2'];
	$answer3 = $_POST['answer3'];
	$answer4 = $_POST['answer4'];
	
	$isCorrect = preg_replace('/[^0-9a-z]/', "", $_POST['iscorrect']);

	$answer1 = strip_tags($answer1);
	$answer1 = $mysqli->real_escape_string($answer1);

	$answer2 = strip_tags($answer2);
	$answer2 = $mysqli->real_escape_string($answer2);

	$answer3 = strip_tags($answer3);
	$answer3 = $mysqli->real_escape_string($answer3);

	$answer4 = strip_tags($answer4);
	$answer4 = $mysqli->real_escape_string($answer4);

	$question = strip_tags($question);
	$question = $mysqli->real_escape_string($question);

	$note = strip_tags($note);
	$note = $mysqli->real_escape_string($note);


	if((!$question) || (!$answer1) || (!$answer2) || (!$answer3) || (!$answer4) || (!$isCorrect)){
		echo "Sorry, All fields must be filled in to add a new question to the quiz. Please press back in your browser and try again.";
		exit();
		}


	$sql = $mysqli->query("INSERT INTO questions (Questions, Note) VALUES ('$question', '$note')")or die(mysql_error());
		$lastId = mysqli_insert_id($mysqli);
		
	
	
		if($isCorrect == "answer1"){
		$sql2 = $mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer1', 1,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer2', 0,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer3', 0,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer4', 0,'$lastId')")or die(mysql_error());
		$msg = 'Thanks, your question has been added';
	  header('location: admin.php?msg='.$msg.'');
	exit();
	}
	if($isCorrect == "answer2"){
		$sql2 = $mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer2', 1,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer1', 0,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer3', 0,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer4', 0,'$lastId')")or die(mysql_error());
		$msg = 'Thanks, your question has been added';
	  header('location: admin.php?msg='.$msg.'');
	exit();
	}
	if($isCorrect == "answer3"){
		$sql2 = $mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer3', 1,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer1', 0,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer2', 0,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer4', 0,'$lastId')")or die(mysql_error());
		$msg = 'Thanks, your question has been added';
	  header('location: admin.php?msg='.$msg.'');
	exit();
	}
	if($isCorrect == "answer4"){
		$sql2 = $mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer4', 1,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer1', 0,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer2', 0,'$lastId')")or die(mysql_error());
		$mysqli->query("INSERT INTO reponse (reponse, Correct, Id_Question) VALUES ('$answer3', 0,'$lastId')")or die(mysql_error());
		$msg = 'Thanks, your question has been added';
	  header('location: admin.php?msg='.$msg.'');
	exit();
		}
	
}
?>
<?php 
$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create A Quiz</title>


<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	
	<title>The Quiz Game</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />

</head>

<body>
   <div style="text-align:center;">
   <p style="color:#fffff"><?php echo $msg; ?></p>
				<h1>Welcome to the admin page </h1>
	
		
			<ul class="header-contentt">
				<a href="index.php">Disconnect</a>
			</ul>
	
	
	<br><h2>Please fill the form to add a new question ! </h2>
    
    
   </div>
 
 <div class="content" id="mc">
  	<h3>Multiple Choice</h3>
    <form action="admin.php" name="addMcQuestion" method="post">
    <strong>Please type your new question here</strong>
        <br />
        <textarea id="mcdesc" name="desc" style="width:400px;height:95px;"></textarea>
        <br />
      <br />
    <strong>Please type the note for the question</strong>
    	<br />
        <input type="number" id="mcnote" name="note">&nbsp;
        <br />
    <br />
    <strong>Please create the first Correct for the question</strong>
    	<br />
        <input type="text" id="mcanswer1" name="answer1">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer1">Is it  Correct?
        </label>
      <br />
    <br />
    <strong>Please create the second Correct for the question</strong>
    <br />
        <input type="text" id="mcanswer2" name="answer2">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer2">Is it Correct?
        </label>
      <br />
    <br />
    <strong>Please create the third Correct for the question</strong>
    <br />
        <input type="text" id="mcanswer3" name="answer3">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer3">Is it Correct?
        </label>
      <br />
    <br />
    <strong>Please create the fourth Correct for the question</strong>
    <br />
        <input type="text" id="mcanswer4" name="answer4">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer4">Is it Correct?
        </label>
      <br />
    <br />
    <!-- <input type="hidden" value="mc" name="type"> -->
    <input type="submit" value="Add To Quiz">
    </form>
 </div>
</body>
</html>