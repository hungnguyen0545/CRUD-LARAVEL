function routeEvents(route) {
    return document.getElementById('calendar').dataset[route];
}

$(function() { // execute when load page

    $('.date-time').mask('00/00/0000 00:00:00');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('.saveEvents').click(function() {
        let id = $("#ModalCalendar input[name='id']").val();

        let title = $("#ModalCalendar input[name='title']").val();

        let start = moment($("#ModalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss").format('YYYY-MM-DD HH:mm:ss');

        let end = moment($("#ModalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss").format('YYYY-MM-DD HH:mm:ss');

        let color = $("#ModalCalendar input[name='color']").val();

        let description = $("#ModalCalendar textarea[name='description']").val();

        let Event = {
            title: title,
            start: start,
            end: end,
            color: color,
            description: description
        }
        let route;
        if (id == '') {
            route = routeEvents('routeStoreEvents');
        } else {
            route = routeEvents('routeUpdateEvents');
            Event.id = id;
            Event._method = 'PUT'
        }
        sendEvent(route, Event);
    })
    $('.deleteEvent').click(function() {
        let id = $("#ModalCalendar input[name='id']").val();
        let Event = {
            id: id,
            _method: 'DELETE'
        }
        sendEvent(routeEvents('routeDeleteEvents'), Event);
    })
})

function sendEvent(route, data_) {
    $.ajax({
        url: route,
        type: 'POST',
        data: data_,
        dataType: 'json',
        success: function(json) {
            if (json) {
                alert('Do Successfully !!! ');
                location.reload();
            }
        },
        error: function(error) {
            alert('Get Some Mistake');
            console.log(error);
        }
    })
}

function resetForm(form) {
    $(form)[0].reset();
}