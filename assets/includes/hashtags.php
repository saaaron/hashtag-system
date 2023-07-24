<?php 
	// select all hash tags
	$query = "SELECT * FROM hash_tags ORDER BY created_on DESC";
	$stmt = mysqli_prepare($db, $query);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$keyword = $row["keyword"];

		// hashtag
		$hashtag = '#'.$keyword;

		// count hashtag posts
	    $select_posts = "SELECT * FROM posts WHERE body LIKE CONCAT('%', ?, '%')";
	    if ($stmt = mysqli_prepare($db, $select_posts)) {
		    mysqli_stmt_bind_param($stmt, "s", $hashtag);
		    mysqli_stmt_execute($stmt);
		    while (mysqli_stmt_fetch($stmt)) {
		      // fetch results
		    }

		    if (mysqli_stmt_num_rows($stmt) == 0) {
		     $total_posts = "";
		    } elseif (mysqli_stmt_num_rows($stmt) == 1) {
		     $total_posts = number_format(mysqli_stmt_num_rows($stmt))." post";
		    } else {
		     $total_posts = number_format(mysqli_stmt_num_rows($stmt))." posts";
		    }
		      	
		}

		echo '
			<a href="hashtag.php?keyword='.$keyword.'">
				<div class="hashtag-container p-2">
					<h6>
						#'.$keyword.'
					</h6>
					<div>
						<font color="#aaa">'.$total_posts.'</font>
					</div>					
				</div>
			</a>';
	}

	$query = "SELECT * FROM hash_tags";
	if ($stmt = mysqli_prepare($db, $query)) {
		mysqli_stmt_execute($stmt);
		while (mysqli_stmt_fetch($stmt)) {
			// fetch results
		}

		if (mysqli_stmt_num_rows($stmt) == 0) {
			echo "
				<div class='text-center p-3 mt-2'>
					<b><font color='#aaa'>No hashtags yet!</font></b>
				</div>";
		}
	}
?>
