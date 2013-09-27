<?php  

include_once ("database.php");

// function getComments2($spotname) {
// 	// $spotname = 'trawangan';
// 	$comments = "";
// 	$sql = mysql_query("SELECT * FROM comments WHERE surf_spot = '$spotname' order by id desc limit 3") or die(mysql_error());
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


function getComments2($spotname) {
	// $spotname = 'trawangan';
	$comments = "";
	$sql = mysql_query("SELECT * FROM comments WHERE surf_spot = '$spotname' order by id desc limit 3") or die(mysql_error());
		if (mysql_num_rows($sql) == 0) {
			$comments = "<div class='each_comment'>NO COMMENTS YET</div>";
		} else {
			while ($row = mysql_fetch_assoc($sql)) {
				$comments .= "<div class='each_comment'><p class='nunito-bold'><span class='comment_text'>"
								.$row['submission_text'].
								"</span><br><span class='comment_info'>"
								.$row['username'].
								", "
								.$row['nationality'].
								"<br>"
								.convert($row['submission_time']).
								"</span></p></div><hr style='margin:0; padding: 0; color:#FFF; border:none; height:3px;''>"; //this is working
			}
		}

	return $comments;
}



// function getComments2($spotname) {
// 	// $spotname = 'trawangan';
// 	$comments = "";
// 	$sql = mysql_query("SELECT * FROM comments WHERE surf_spot = '$spotname' order by id desc limit 3") or die(mysql_error());
// 		if (mysql_num_rows($sql) == 0) {
// 			$comments = "<div class='each_comment'>NO COMMENTS YET</div>";
// 		} else {
// 			while ($row = mysql_fetch_assoc($sql)) {

// 				$comments .= "<div class='each_comment'><p><span class='comment_text'>".$row['submission_text']."</span><br><span class='comment_info'".$row['username'].",".$row['nationality']."<br>".convert($row['submission_time'])."</span></p></div>"; //this is working
// 			}
// 		}

// 	return $comments;
// }

?>