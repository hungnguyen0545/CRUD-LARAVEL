$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('input[type="checkbox"]').click(function() {
        let checked = $(this).prop("checked");
        let id = $(this).val();
        $.ajax({
            url: '/students/check',
            type: 'POST',
            data: {
                id: id,
                hasChecked: checked
            },
            dataType: 'json',
            success: function(data) {
                if (data.mess === 'success') {
                    alert('Do Sccessfully !')
                }
            },
            error: function(error) {
                alert('Get Some Error !')
                console.log(error);
            }
        })
    })
})