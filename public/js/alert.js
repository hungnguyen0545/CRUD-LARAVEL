$(document).ready(function() {
    $('.alert').fadeOut(2000);

    $('.btn-delete').on('click', function() {
        if (confirm('Bạn có chắc chắn muốn xoá thông tin này ?')) {
            return true;
        } else {
            return false;
        }
    })
})