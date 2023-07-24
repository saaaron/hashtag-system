<?php  
	if (isset($_GET['keyword'])) { // if URL = http://localhost/hashtag_system/hashtag.php?keyword
		if ($_GET["keyword"] == null) { // if URL = http://localhost/hashtag_system/hashtag.php?keyword=
			header("location: see_all.php");
		} else {
			$keyword = $_GET["keyword"]; // if URL = http://localhost/hashtag_system/hashtag.php?keyword=hashtag
		}
	} else {
		header("location: see_all.php"); // if URL = http://localhost/hashtag_system/hashtag.php
	}

	// database connection
	include "assets/includes/connect.php";

	$page_title = "#".$keyword; // page title

	// header
	include "assets/includes/header.php";	
?>
		<div class="container">
			<div class="row" style="margin-top: 80px">
				<div class="col-lg-1 col-xl-1"></div>
				<div class="col-md-6 col-lg-6 col-xl-6 mb-sm-3">
					<div id="navigation-links">
						<a href="index.php">Go back home</a> << <b>#<?php echo $keyword; ?></b>
					</div>
					<div class="text-center p-3">
						<h3>#<?php echo $keyword; ?></h3>
						<?php 
							// count total hashtag posts
							include "assets/includes/total_hashtag_posts.php";
						?>
					</div>
					<?php  
						// hashtag posts
						include "assets/includes/hashtag_posts.php";
					?>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div id="sticky-container">
						<h3>
							Trending hashtags
						</h3>
						<p class="text-muted"> 
							List of 5 recent hashtags not older than 7 days in descending order 
						</p>
						<div class="card border-0 bg-w d-grid gap-1 p-2 th_link mb-2">
							<?php 
								// trending hash tags
								// 5 current hash tags used in post 7 days ago
								include "assets/includes/trending_hashtags.php";
							?>
						</div>
						<div>
							[<a href="search.php">Search</a>]
							[<a href="see_all.php">See all</a>]
							[<a href="#top">Go to Top</a>]
						</div>
					</div>
				</div>
				<div class="col-lg-1 col-xl-1"></div>
			</div>
			<br>
			<br>
		</div>
<?php  
	// footer
	include "assets/includes/footer.php";
?>