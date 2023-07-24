$(document).ready(function() {
  load_live_trending_hashtags();

  function load_live_trending_hashtags() {
    $.ajax( {    
        type: "GET",
        url: "assets/includes/live_trending_hashtags.php", 
        cache: false,           
        dataType: "json",   
        success: function(d) {                    
            $("#trending_hashtags").html(d.trending_hashtags); 
        }
    });
  }

  setInterval(function() {
    load_live_trending_hashtags();
  }, 1000);
});