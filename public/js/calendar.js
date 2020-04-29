document.addEventListener('DOMContentLoaded', function() {

    /* initialize the calendar
    -----------------------------------------------------------------*/
    let Calendar = FullCalendar.Calendar;
    const calendarEl = document.getElementById('calendar');
    let calendar = new Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        navLinks: true,
        eventLimit: true,
        selectable: true,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function(arg) {
            // is the "remove after drop" checkbox checked?
            if (document.getElementById('drop-remove').checked) {
                // if so, remove the element from the "Draggable Events" list
                arg.draggedEl.parentNode.removeChild(arg.draggedEl);
            }
        },
        eventDrop: function(element) {
            console.log(element);
            let start = moment(element.event.start).format('YYYY-MM-DD HH:mm:ss');
            let end = moment(element.event.end).format('YYYY-MM-DD HH:mm:ss');
            let title = element.event.title;
            let color = element.event.backgroundColor;

            let newEvent = {
                _method: 'PUT',
                id: element.event.id,
                title: title,
                start: start,
                end: end,
                color: color
            }
            sendEvent(routeEvents('routeUpdateEvents'), newEvent);
        },

        eventClick: function(element) {
            resetForm("#formEvent");

            $('#ModalCalendar').modal('show');
            $('#ModalCalendar #ModalTitle').text('Change Event');

            let id = element.event.id;
            $("#ModalCalendar input[name='id']").val(id);

            let title = element.event.title;
            $("#ModalCalendar input[name='title']").val(title);

            let start = moment(element.event.start).format('DD/MM/YYYY HH:mm:ss');
            $("#ModalCalendar input[name='start']").val(start);

            let end = moment(element.event.end).format('DD/MM/YYYY HH:mm:ss');
            $("#ModalCalendar input[name='end']").val(end);

            let color = element.event.backgroundColor;
            $("#ModalCalendar input[name='color']").val(color);

            let description = element.event.extendedProps.description;
            $("#ModalCalendar textarea[name='description']").val(description);
        },

        eventResize: function(element) {
            let start = moment(element.event.start).format('YYYY-MM-DD HH:mm:ss');
            let end = moment(element.event.end).format('YYYY-MM-DD HH:mm:ss');
            let newEvent = {
                _method: 'PUT',
                id: element.event.id,
                start: start,
                end: end
            }

            sendEvent(routeEvents('routeUpdateEvents'), newEvent);
        },
        select: function(element) {
            resetForm("#formEvent");

            $('#ModalCalendar').modal('show');
            $('#ModalCalendar #ModalTitle').text('Addition Event');
            $('.deleteEvent').css("display", "none");

            let start = moment(element.start).format('DD/MM/YYYY HH:mm:ss');
            $("#ModalCalendar input[name='start']").val(start);

            let end = moment(element.end).format('DD/MM/YYYY HH:mm:ss');
            $("#ModalCalendar input[name='end']").val(end);

            $("#ModalCalendar input[name='color']").val('#28a745');
        },

        events: routeEvents('routeLoadEvents'),
    });
    calendar.render();
});