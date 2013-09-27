<?php

	function connect() {
		global $pdo;
		$pdo = new PDO("mysql:host=localhost;dbname=comments_and_photos", "lombok","lombok");
	}

	function get_comments(){  //replaced get_actors
		//check the sql in phpmyadmin but basically its SELECT * FROM 'comments' check the curly quotes
		
	} 

?>