<?php 
	// select and count all posts with keyword
	$select_ht_posts = "SELECT * FROM posts WHERE body LIKE CONCAT('%', ?, '%')";
	if ($stmt = mysqli_prepare($db, $select_ht_posts)) {
		mysqli_stmt_bind_param($stmt, "s", $keyword);
		mysqli_stmt_execute($stmt);
		while (mysqli_stmt_fetch($stmt)) {
		  	// fetch results
		}

		if (mysqli_stmt_num_rows($stmt) == 0) {
		    echo "";
		} elseif (mysqli_stmt_num_rows($stmt) == 1) {
		    echo number_format(mysqli_stmt_num_rows($stmt))." post";
		} else {
		    echo number_format(mysqli_stmt_num_rows($stmt))." posts";
		}
	}
?>