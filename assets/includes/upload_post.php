<?php 
	// header
	header('Content-Type: application/json');

	// connect to database
	include "connect.php";

	// select hashtag from post function
	include "get_hashtags_function.php"; 

	// format post function
	include "format_post_function.php";

	// upload post
	if (isset($_POST["post_text"])) {
		
		// validate message
		if (empty(trim($_POST["post_text"]))) {
			$error = 1; // empty
		} elseif (mb_strlen($_POST["post_text"], "UTF-8") > 100) {
			$error = 1; // greater than 100
		} else {
			$post = $_POST["post_text"]; // post
			$error = 0; // no error
		}

		// if comment has no errors
		if ($error == 0) {
			// PREPARE INSERT STATEMENT
			// `posts`
			$insert = "INSERT INTO posts(body) VALUES(?)";

			if ($stmt = mysqli_prepare($db, $insert)) {
				// SET PARAMETERS
				$param_post = $post;
				$hashtags = gethashtags($post); // get hashtags from post

				// insert hashtags into database (new or update)
				foreach($hashtags as $hashtag) {
					if ($hashtag !== "") {
						// check if hashtag already exist in database table
						$hashtag_exist = "SELECT * FROM hash_tags WHERE keyword = ?";
						if ($stmt = mysqli_prepare($db, $hashtag_exist)) {
							mysqli_stmt_bind_param($stmt, "s", $hashtag);
							mysqli_stmt_execute($stmt);
							while (mysqli_stmt_fetch($stmt)) {
								// fetch results
							}

							if (mysqli_stmt_num_rows($stmt) > 0) {
								// hashtag already exist in database table
								// if hashtag exist, update time created only (so that hashtag will be among "trending hashtags")
								$insert = "UPDATE hash_tags SET created_on = NOW() WHERE keyword = ?";
								$stmt = mysqli_prepare($db, $insert);
								mysqli_stmt_bind_param($stmt, "s", $hashtag);
								mysqli_stmt_execute($stmt);							
							} else {
								// hashtag does not exist in database table
								// insert hashtag into database 
								$insert = "INSERT INTO hash_tags(keyword) VALUES(?)";
								$stmt = mysqli_prepare($db, $insert);
								mysqli_stmt_bind_param($stmt, "s", $hashtag);
								mysqli_stmt_execute($stmt);
							}
						}					
					} else {
						// nothing
					}
				}

				// insert post into database
				$insert = "INSERT INTO posts(body) VALUES(?)";
				$stmt = mysqli_prepare($db, $insert);
				mysqli_stmt_bind_param($stmt, "s", $param_post);
				mysqli_stmt_execute($stmt);

				// format post 
                $param_post = format_post($param_post);

				$output = array(
					'post' => $param_post
				);

				// encode output in json
				echo json_encode($output);

			} else {
				// echo "Ops! A problem occurred";
			}

			// close statement
			mysqli_stmt_close($stmt);
		}		
  	}
?>