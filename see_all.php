<?php  
	// connect to database
	include "assets/includes/connect.php";
	
	$page_title = "See all"; // page title

	// header
	include "assets/includes/header.php";
?>
		<div class="container">
			<div class="row" style="margin-top: 80px">
				<div class="col-lg-1 col-xl-1"></div>
				<div class="col-md-6 col-lg-6 col-xl-6 mb-sm-3">
					<div id="navigation-links">
						<a href="index.php">Go back home</a> << <b>See all</b>
					</div>
					<div class="text-center p-3">
						<h3>#hashtags</h3>
						<?php  
							// total number of hashtags
							include "assets/includes/total_hashtags.php";
						?>
					</div>
					<div class="card border-0 bg-w d-grid gap-1 p-2 th_link">
						<?php  
							// hashtags
							include "assets/includes/hashtags.php";
						?>
					</div>					
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
								// trending hashtags
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