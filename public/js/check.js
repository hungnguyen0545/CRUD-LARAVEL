$(document).ready(function() {

    $('input[type="checkbox"]').click(function() {
        let checked = $(this).prop("checked");
        let id = $(this).val();
        console.log(checked);
        $.ajax({
            url: '/students/check/' + id + "/" + checked,
            type: 'GET',
        })
    })
})