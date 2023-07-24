<?php
  // connect to database
  include 'connect.php';

  // variables
  $keyword = $results = '';

  if (isset($_POST["query"])) {
    // keyword
    $keyword = $_POST["query"];

    // hash tags
    $select_hashtags = "SELECT * FROM hash_tags WHERE keyword LIKE CONCAT('%', ?, '%') ORDER BY created_on DESC";
    if ($stmt = mysqli_prepare($db, $select_hashtags)) {
      mysqli_stmt_bind_param($stmt, "s", $keyword);
      mysqli_stmt_execute($stmt);
      while (mysqli_stmt_fetch($stmt)) {
        // fetch results
      }

      $total_hashtag_results = mysqli_stmt_num_rows($stmt);
    }

    // show result stats
    echo "
    <div>
      ".number_format($total_hashtag_results)." Found | Searching for <strong>#".htmlentities($keyword)."</strong>
    </div>";

    $select_hashtags = "SELECT * FROM hash_tags WHERE keyword LIKE CONCAT('%', ?, '%') ORDER BY created_on DESC";
    $stmt = mysqli_prepare($db, $select_hashtags);
    mysqli_stmt_bind_param($stmt, "s", $keyword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      // fetch results
      $keyword = $row["keyword"]; // keyword
      $hashtag = "#".$keyword;

      // hashtag total post
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
            <h6>'.$hashtag.'</h6>
            <div>
              <font color="#aaa">'.$total_posts.'</font>
            </div>
          </div>
        </a>';
    }

    // no results found
    if ($total_hashtag_results > 0) {
      // show searched results...
    } else {
      echo "
        <div class='text-center p-5'>
          <strong>
            <font color='#aaa'>No hashtag found with the keyword '".htmlentities($keyword)."'</font>
          </strong>
        </div>";
    }

    // close statement
    mysqli_stmt_close($stmt);
  } 
  // close database connection
  mysqli_close($db);

  // search preview if true or false
  if ($keyword == true) {
    // show searched results...
  } elseif ($keyword == false) {
    echo "
    <div class='p-3 text-center'>
      <strong>
        <font color='#aaa'>Search for hashtag without adding #</font>
      </strong>
    </div>";
  }
?>