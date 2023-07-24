function count_char(txtarea, maxLength) {
    var len = $(txtarea).val().length;
    if (len > maxLength) {
        $(txtarea).val($(txtarea).val().slice(0, maxLength));
    } else {
        $('#char-num').text(maxLength - len);
    }
}
