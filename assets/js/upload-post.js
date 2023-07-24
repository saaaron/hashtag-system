$(document).ready(function() {
  // enable post button if textarea is not null
  $("#post-textarea > textarea").on("keyup", function() {

    let empty = false;

    $("#post-textarea > textarea").each(function() {
      empty = $(this).val().length == 0;
    });

    if (empty) {
      $("#post-button > button").attr("disabled", "disabled");
    } else {
      $("#post-button > button").attr("disabled", false);
    }
  });

  $("#upload-button").click(function() {
      // text area
      var post_input = $("#post-textarea > textarea").val();

      $.ajax({
        url: "assets/includes/upload_post.php",
        type: "POST",
        data:{
          post_text:post_input
        },
        dataType: "json",
        beforeSend: function() {
          $('#uploading').html('<div class="card p-2 mt-2 border-0 bg-w"><div class="d-flex justify-content-center"><span class="spinner-border spinner-border-sm"></span</div></div>');
        },
        success:function(d) {
          $('#uploading').html('');
          $('#no_post').hide();
          $("#post-button > button").attr('disabled', true);
          $('#char-num').html('100');
          if (d.post) {
              var html = '<div class="card p-2 mt-2 border-0 bg-w d-grid gap-1">';
                    html += '<div class="d-flex justify-content-start">';
                      html += '<div class="user-img"><img src="assets/img/user.png" alt="Profile photo"></div>';
                      html += '<div class="user-info"><b>Anonymous</b></div>';
                    html += '</div>';
                    html += '<div>'+d.post+'</div>';
                    html += '<div><font color="#aaa">Just now</font></div>';
                  html += '</div>';
            $('#posts').prepend(html); 
            $("#post-textarea > textarea").val('');
          }
        }
      });
    });
});