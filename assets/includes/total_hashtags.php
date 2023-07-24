<?php 
	// total hash tags
	$total_ht = "SELECT * FROM hash_tags";
	if ($stmt = mysqli_prepare($db, $total_ht)) {
		mysqli_stmt_execute($stmt);
		while (mysqli_stmt_fetch($stmt)) {
			// fetch results
		}

		// total number
		echo number_format(mysqli_stmt_num_rows($stmt));
	}
?>