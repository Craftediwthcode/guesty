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
                const date = $(this).data("date") || new Date().toISOString().split('T')[0];
                fetchCalendarData({
                    operation,
                    date
                });
            });
            $(document).on("click", ".switch-left", function() {
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
                $.ajax({
                    url: "{{ route('property.fetchCalender') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        property_id: propertyId,
                        date,
                        operation
                    },
                    success: function(response) {
                        $('#calendarContainer').html(response.html_calendar);
                    }
                });
            }
        });
    </script>
</body>

</html>
