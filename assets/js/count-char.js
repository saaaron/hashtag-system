$(document).ready(function() { 
    function count_char(txtarea, l) {
        var len = $(txtarea).val().length;
        if (len > l) {
        	$(txtarea).val($(txtarea).val().slice(0, l));
        } else {
        	$('#char-num').text(l - len);
        }
    }
});