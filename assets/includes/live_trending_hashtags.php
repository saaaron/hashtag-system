<?php 
	// header
	header('Content-Type: application/json');

	// connect to database
	include "connect.php";

	// variables
	$trending_hashtags = "";

	// select 5 recent hashtags not older than 7 days in descending order 
	$query = "SELECT * FROM hash_tags WHERE created_on >= SUBDATE(NOW(), INTERVAL 7 DAY) ORDER BY created_on DESC LIMIT 5";
	$stmt = mysqli_prepare($db, $query);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$keyword = $row["keyword"];
		$created_on = $row['created_on'];

		// hashtag
		$hashtag = '#'.$keyword;

		// select and count all posts with keyword
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

		$trending_hashtags .= '
			<a href="hashtag.php?keyword='.$keyword.'">
				<div class="hashtag-container p-2">
					<h6>#'.$keyword.'</h6>
					<div>
						<font color="#aaa">'.$total_posts.'</font>
					</div>
				</div>
			</a>';
	}

	// check if 5 recent hashtags not older than 7 days exist
	$query = "SELECT * FROM hash_tags WHERE created_on >= SUBDATE(NOW(), INTERVAL 7 DAY) LIMIT 5";
	if ($stmt = mysqli_prepare($db, $query)) {
		mysqli_stmt_execute($stmt);
		while (mysqli_stmt_fetch($stmt)) {
			// fetch results
		}

		if (mysqli_stmt_num_rows($stmt) == 0) {
			$trending_hashtags = "
				<div class='text-center p-5'>
					<font color='#aaa'><b>No trending hahstags yet!</b></font>
				</div>";
		}
	}

	$output = array(
		'trending_hashtags' => $trending_hashtags
	);

	// encode output in json
	echo json_encode($output);

	// close statement
	mysqli_stmt_close($stmt);
?>
