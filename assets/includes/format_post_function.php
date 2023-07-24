<?php  
	function format_post($post) {
		// html entities
        $post = htmlentities($post);

		// linkify URLs
        $post = preg_replace('~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~', '<a href="\\0\" target="_blank" title="\\0">\\0</a>', $post);

        // linkify hash tags
        $post = preg_replace('/\#([A-Za-z0-9_]{1,20}+)/', '<a href="hashtag.php?keyword=\1" title="#\1">#\1</a>', $post);

        // break 
        $post = nl2br($post);

        return $post;
	}
?>