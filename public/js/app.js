const colors = ['#007bff', '#6c757d', '#28a745'];

$(document).ready(function () {
    let calendarEl = document.getElementById('calendar');

    if(!calendarEl) {
        return;
    }

    $.ajax({
        url: '/tasks',
        type: 'GET',
        success: function (data) {
            showCalendar(data)
        }
    });

    let showCalendar = function (data) {
        let events = data.map(function (task) {
            return {
                title: task.name,
                start: task.start_date,
                end: task.end_date,
                backgroundColor: colors[task.status]
            }
        });

        let calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'dayGridMonth,timeGridWeek,timeGridDay',
                center: 'title',
                right: 'prev,next'
            },
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true,
            events: events
        });

        calendar.render();
    }

});