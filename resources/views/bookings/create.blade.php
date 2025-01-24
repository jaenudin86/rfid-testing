<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/booking.js') }}"></script>
</head>
<body>
    <div class="container">
        <h1>Create Booking</h1>
        <form id="bookingForm">
            @csrf
            <div class="form-group">
                <label for="booking_room_id">Room ID</label>
                <input type="text" class="form-control" id="booking_room_id" name="booking_room_id" required>
            </div>
            <div class="form-group">
                <label for="booking_package_id">Package ID</label>
                <input type="text" class="form-control" id="booking_package_id" name="booking_package_id" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="booking_expired">Booking Expired</label>
                <input type="text" class="form-control" id="booking_expired" name="booking_expired">
            </div>
            <div class="form-group">
                <label for="month">Month</label>
                <input type="number" class="form-control" id="month" name="month" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="booking_status">Booking Status</label>
                <input type="text" class="form-control" id="booking_status" name="booking_status">
            </div>
            <div class="form-group">
                <label for="request">Request</label>
                <textarea class="form-control" id="request" name="request"></textarea>
            </div>
            <div class="form-group">
                <label for="booking_customer_id">Customer ID</label>
                <input type="text" class="form-control" id="booking_customer_id" name="booking_customer_id" required>
            </div>
            <div class="form-group">
                <label for="rfid">RFID</label>
                <input type="text" class="form-control" id="rfid" name="rfid" required>
            </div>
            <div class="form-group">
                <label for="datein">Date In</label>
                <input type="datetime-local" class="form-control" id="datein" name="datein">
            </div>
            <div class="form-group">
                <label for="dateout">Date Out</label>
                <input type="datetime-local" class="form-control" id="dateout" name="dateout">
            </div>
            <button type="submit" class="btn btn-primary">Create Booking</button>
        </form>
        <div id="responseMessage" class="mt-3"></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#bookingForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route("bookings.store") }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        $('#bookingForm')[0].reset();
                    },
                    error: function(xhr) {
                        $('#responseMessage').html('<div class="alert alert-danger">' + xhr.responseJSON.message + '</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
