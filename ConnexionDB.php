<?php
	define('DB_HOST', 'localhost');  
	define('DB_USER', 'root');
	define('DB_PASSWORD','');
	define('DB_NAME', 'quiz');


$mysqli = new mysqli("localhost", "med", "medbt", "quiz");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	// $dblink = mysql_connect('localhost', 'med', 'medbt');

	// if($dblink) {
 //    	$selectdatabase = mysql_select_db('quiz');
 //    if(!$selectdatabase) {
 //        echo 'erreur lors de la selection de la bdd';
 //        exit;
 //    }
	// } else {
 //    	echo 'erreur de connexion a la bdd';
 //    	exit;
	// }

?>
