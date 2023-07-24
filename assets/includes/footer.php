<?php
		echo '
		<script src="assets/js/jquery-3.7.0.min.js"></script>';

	if ($page_title == 'Hashtag system') { // only show scripts when page title is 'Hashtag system'
		echo '
		<script src="assets/js/count-char.js"></script>
		<script src="assets/js/upload-post.js"></script>
		<script src="assets/js/live-trending-hashtags.js"></script>';
	} elseif ($page_title == 'Search') { // only show script when page title is 'Search'
		echo '
		<script src="assets/js/search.js"></script>';
	}
			
echo '
	</body>
</html>';
?>