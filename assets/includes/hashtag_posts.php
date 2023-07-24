<?php 
	// format post function
	include "assets/includes/format_post_function.php";

	// format time function
	include "assets/includes/format_time_function.php";

	// hashtag
	$hashtag = '#'.$keyword;

	// select posts 
	$query = "SELECT * FROM posts WHERE body LIKE CONCAT('%', ?, '%') ORDER BY created_on DESC";
	$stmt = mysqli_prepare($db, $query);
	mysqli_stmt_bind_param($stmt, "s", $hashtag);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$post_body = $row["body"];
		$created_on = $row['created_on'];

		echo '
			<div class="card p-2 mt-2 border-0 bg-w d-grid gap-1">
				<div class="d-flex justify-content-start">
					<div class="user-img">
						<img src="assets/img/user.png" alt="Profile photo">
					</div>	
					<div class="user-info">
						<b>Anonymous</b>
					</div>
				</div>
				<div>
					'.format_post($post_body).'
				</div>
				<div>
					<font color="#aaa">'.format_time($created_on).'</font>
				</div>
			</div>';
	}

	$query = "SELECT * FROM posts WHERE body LIKE CONCAT('%', ?, '%')";
	if ($stmt = mysqli_prepare($db, $query)) {
		mysqli_stmt_bind_param($stmt, "s", $hashtag);
		mysqli_stmt_execute($stmt);
		while (mysqli_stmt_fetch($stmt)) {
			// fetch results
		}

		if (mysqli_stmt_num_rows($stmt) == 0) {
			echo "
				<div class='card border-0 bg-w text-center p-5 mt-2'>
					<font color='#aaa'><b>No posts found!</b></font>
				</div>";
		}
	}	
?>
