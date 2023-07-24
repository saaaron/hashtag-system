<?php  
	// connect to database
	include "assets/includes/connect.php";

	$page_title = "Hashtag system"; // page title

	// header
	include "assets/includes/header.php";
?>
		<div class="container">
			<div class="row" style="margin-top: 80px">
				<div class="col-lg-1 col-xl-1"></div>
				<div class="col-md-6 col-lg-6 col-xl-6 mb-sm-3">
					<div>
						<div id="post-textarea">
							<textarea rows="2" class="form-control" onkeyup="count_char(this, 100)" placeholder="Post something with a #hashtag..."></textarea>
						</div>
						<div class="d-flex justify-content-between mt-1">
							<div>
								<span><b id="char-num">100</b> characters remaining</span>
							</div>
							<div id="post-button">
								<button type="submit" id="upload-button" class="btn btn-dark btn-sm" disabled="disabled">
									<b class="m-4">Post</b>
								</button>
							</div>
						</div>
					</div>
					<div id="uploading"></div>
					<div id="posts">
						<?php 
							// post created by users
							include "assets/includes/posts.php";
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
						<div class="card border-0 bg-w d-grid gap-1 p-2 th_link mb-2" id="trending_hashtags"></div>
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
