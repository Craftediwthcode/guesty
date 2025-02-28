<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.sandpalproperties.com/live4calender/style.css">
</head>

<body>
    <div class="col-md-12">
        <div class="calendar-section" id="calendarContainer">

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {
            const calendarContainer = $("#calendarContainer");
            const propertyId = "{{ $id }}";
            const csrfToken = "{{ csrf_token() }}";
            const baseUrl = "{{ route('property.fetchCalender') }}";
            $(document).on("click", ".switch-month", function() {
                const operation = $(this).hasClass("switch-left") ? "minus" : "plus";
                const date = $(this).data("date") || "2025-03-07";
                fetchCalendarData({
                    operation,
                    date
                });
            });
            fetchCalendarData({
                operation: "current",
                date: "2025-03-07"
            });

            function fetchCalendarData({
                operation,
                date
            }) {
                const data = {
                    _token: csrfToken,
                    property_id: propertyId,
                    date,
                    operation,
                };
                $.post(baseUrl, data, function(response) {
                    $('#calendarContainer').html(response.html_calendar);
                    //renderCalendar(response.data.days);
                });
            }

            function renderCalendar(days) {
                const febDays = days.filter(day => day.date.startsWith("2025-02"));
                const marDays = days.filter(day => day.date.startsWith("2025-03"));
                const febInfo = getMonthYearInfo(febDays[0]?.date || "2025-02-01");
                const marInfo = getMonthYearInfo(marDays[0]?.date || "2025-03-01");
                const calendarHTML = `
                    <div class="row no-gutters">
                        <div class="col-md-6">${buildCalendar(febInfo, febDays, "calendar-first", true)}</div>
                        <div class="col-md-6">${buildCalendar(marInfo, marDays, "calendar-second", false)}</div>
                    </div>
                `;
                calendarContainer.html(calendarHTML);
            }

            function getMonthYearInfo(dateStr) {
                const dt = new Date(dateStr);
                return {
                    monthName: dt.toLocaleString('default', {
                        month: 'long'
                    }),
                    year: dt.getFullYear(),
                };
            }

            function buildCalendar({
                monthName,
                year
            }, days, calendarClass, isFirstCalendar) {
                const monthIndex = new Date(`${monthName} 1, ${year}`).getMonth();
                const firstDayOfWeek = new Date(year, monthIndex, 1).getDay();
                const totalCells = firstDayOfWeek + days.length;
                const blanksToAdd = (7 - (totalCells % 7)) % 7;
                const headerHTML = `
                    <div class="calendar_header">
                        ${!isFirstCalendar ? `<button class="switch-month switch-left"><i class="fa fa-chevron-left"></i></button>` : ''}
                        <h2>${monthName} ${year}</h2>
                        <button class="switch-month switch-right"><i class="fa fa-chevron-right"></i></button>
                    </div>
                `;
                const weekdaysHTML = `
                    <div class="calendar_weekdays">
                        <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
                    </div>
                `;
                const daysHTML = days.map(day => {
                    const dayNumber = new Date(day.date).getDate();
                    const classes = getDayClass(day);
                    return `<div class="${classes}">${dayNumber} <span>$${day.price}</span></div>`;
                }).join('');
                const blanksHTML = Array(blanksToAdd).fill('<div class="blank"></div>').join('');
                return `
                    <div class="calendar ${calendarClass}" id="${calendarClass}">
                        ${headerHTML}
                        ${weekdaysHTML}
                        <div class="calendar_content">
                            ${Array(firstDayOfWeek).fill('<div class="blank"></div>').join('')}
                            ${daysHTML}
                            ${blanksHTML}
                        </div>
                    </div>
                `;
            }

            function getDayClass(day) {
                console.log('day', day);

                let reservationDate = null;

                // Process blockRefs and extract reservation date
                if (day.blockRefs && day.blockRefs.length > 0) {
                    day.blockRefs.forEach(element => {
                        if (element.reservation) {
                            if (element.reservation.checkIn) {
                                if (!reservationDate) {
                                    reservationDate = element.reservation.checkIn;
                                }
                            }
                        }
                    });
                }

                const classes = [];
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                console.log('reservationDate', reservationDate);

                let currentDate = reservationDate ? new Date(reservationDate) : new Date(day.date);
                currentDate.setHours(0, 0, 0, 0);

                if (currentDate < today) {
                    classes.push("disabled-date");
                } else if (currentDate.getTime() === today.getTime()) {
                    classes.push("current-date");
                } else if (reservationDate) {
                    classes.push("check-out-blocked red check-in-blocked red");
                }

                if (day.blockRefs && day.blockRefs.length > 0) {
                    day.blockRefs.forEach(element => {
                        if (element.reservation) {
                            const checkInDate = new Date(element.reservation.checkInDateLocalized);
                            checkInDate.setHours(0, 0, 0, 0);
                            const checkOutDate = new Date(element.reservation.checkOutDateLocalized);
                            checkOutDate.setHours(0, 0, 0, 0);

                            if (currentDate.getTime() === checkInDate.getTime()) {
                                classes.push("check-in-date");
                            }
                            if (currentDate.getTime() === checkOutDate.getTime()) {
                                classes.push("check-out-date");
                            }
                        }
                    });
                }

                if (day.cta) classes.push("selected-date");

                return classes.join(' ');
            }


        });
    </script>
</body>

</html>
