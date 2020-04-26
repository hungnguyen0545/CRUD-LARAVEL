$(document).ready(function() {
    const khoaOldValue = $("#khoa_Id").val();
    console.log(khoaOldValue);
    if (khoaOldValue !== '') {
        $('#khoa').val(khoaOldValue);
    }
});