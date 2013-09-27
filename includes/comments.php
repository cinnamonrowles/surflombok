<?php

include_once ("database.php");

// $surfspot = 5;

function convert($date) {
	$converteddate = date("F j, Y g:ia", strtotime($date));
	return $converteddate;
}



function getComments($spotname) {
	// $spotname = 'trawangan';
	$comments = "";
	$sql = mysql_query("SELECT * FROM comments WHERE surf_spot = '$spotname' order by id desc limit 3") or die(mysql_error());
		if (mysql_num_rows($sql) == 0) {
			$comments = "<div class='each_comment'>NO COMMENTS YET</div>";
		} else {
			while ($row = mysql_fetch_assoc($sql)) {
				$comments .= "<div class='each_comment'><b>time:</b> "
								.convert($row['submission_time']).
								"<br><b>comment:</b> "
								.$row['submission_text'].
								"<br> <b>username:</b> "
								.$row['username'].
								"<br> <b>from:</b> ".$row['nationality']."</div>"; //this is working
			}
		}

	return $comments;
}


//THIS WORKS!!!!

// function getComments() {
// 	$comments = "";
// 	$sql = mysql_query("SELECT * FROM comments order by id desc limit 3") or die(mysql_error());
// 		if (mysql_num_rows($sql) == 0) {
// 			$comments = "<div class='each_comment'>NO COMMENTS YET</div>";
// 		} else {
// 			while ($row = mysql_fetch_assoc($sql)) {
// 				$comments .= "<div class='each_comment'><b>time:</b> "
// 								.convert($row['submission_time']).
// 								"<br><b>comment:</b> "
// 								.$row['submission_text'].
// 								"<br> <b>username:</b> "
// 								.$row['username'].
// 								"<br> <b>from:</b> ".$row['nationality']."</div>"; //this is working
// 			}
// 		}

// 	return $comments;
// }

// END OF THIS WORKS!!!



function postComments($comment,$username,$nationality,$surfspot){
	$comment = mysql_real_escape_string(strip_tags($comment));
	$username = mysql_real_escape_string(strip_tags($username));
	$nationality = mysql_real_escape_string(strip_tags($nationality));
	$surfspot = mysql_real_escape_string(strip_tags($surfspot));
	$sql = mysql_query("INSERT INTO comments (submission_text, submission_time, username, nationality, surf_spot) VALUES ( '".$comment."', now(), '".$username."', '".$nationality."', '".$surfspot."') ");
	return true;
}

if ((isset($_GET['action'])) && ($_GET['action'] == "post")) {
	postComments($_POST['comment'],$_POST['username'],$_POST['nationality'],$_POST['surfspot']);
	// echo "1";
	// echo $_POST['surfspot'];
	// echo "2";
	// echo $surfspot;
	// echo "3";
	// echo 'surfspot';

	echo getComments($_POST['surfspot']);
}

// echo getComments("trawangan");



?>


