$(document).ready(function() {
    $('.btn-star').on('click', function(e) {
        e.preventDefault();
        btn_star = this;
        var id = $(btn_star).attr("value");
        $.ajax({
            url: '/students/check/' + id,
            type: 'GET',
            success: function(data) {
                location.reload(true);
            }
        })
    })
})