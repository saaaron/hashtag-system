<?php  
	function gethashtags($string) {  
	    $hashtags= FALSE;  
	    preg_match_all("/\#([a-zA-Z0-9_]{1,20}+)/u", $string, $matches);  
	    if ($matches) {
	      	$matches[0] = str_replace('#', '', $matches[0]); //replace #
	      	$hashtags = implode(' ,', $matches[0]);
	    }
	    return explode(" ,", $hashtags);
	}
?>