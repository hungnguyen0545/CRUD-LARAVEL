$(document).ready(function() {
    var count = $('.countfetch').val();
    if (count > 0) {
        $('.count-fetch').append("<p> Tìm thấy " + count +
            " sinh viên </p>")
    } else if (count <= 0) {
        $('.count-fetch').append("<p> Không tìm thấy sinh viên </p>")
    }
})