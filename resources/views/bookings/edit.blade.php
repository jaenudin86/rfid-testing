<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/booking.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <h1>Edit Booking</h1>
        <form id="editBookingForm">
            @csrf
            <input type="hidden" name="booking_id" value="{{ $booking->booking_id }}">
            <div class="form-group">
                <label for="booking_room_id">Room ID</label>
                <input type="text" class="form-control" id="booking_room_id" name="booking_room_id" value="{{ $booking->booking_room_id }}" required>
            </div>
            <div class="form-group">
                <label for="booking_package_id">Package ID</label>
                <input type="text" class="form-control" id="booking_package_id" name="booking_package_id" value="{{ $booking->booking_package_id }}" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $booking->date }}" required>
            </div>
            <div class="form-group">
                <label for="booking_expired">Booking Expired</label>
                <input type="text" class="form-control" id="booking_expired" name="booking_expired" value="{{ $booking->booking_expired }}">
            </div>
            <div class="form-group">
                <label for="month">Month</label>
                <input type="number" class="form-control" id="month" name="month" value="{{ $booking->month }}" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $booking->year }}" required>
            </div>
            <div class="form-group">
                <label for="booking_status">Status</label>
                <input type="text" class="form-control" id="booking_status" name="booking_status" value="{{ $booking->booking_status }}">
            </div>
            <div class="form-group">
                <label for="request">Request</label>
                <textarea class="form-control" id="request" name="request">{{ $booking->request }}</textarea>
            </div>
            <div class="form-group">
                <label for="booking_customer_id">Customer ID</label>
                <input type="text" class="form-control" id="booking_customer_id" name="booking_customer_id" value="{{ $booking->booking_customer_id }}">
            </div>
            <div class="form-group">
                <label for="rfid">RFID</label>
                <input type="text" class="form-control" id="rfid" name="rfid" value="{{ $booking->rfid }}" required>
            </div>
            <div class="form-group">
                <label for="datein">Date In</label>
                <input type="datetime-local" class="form-control" id="datein" name="datein" value="{{ $booking->datein ? $booking->datein->format('Y-m-d\TH:i') : '' }}">
            </div>
            <div class="form-group">
                <label for="dateout">Date Out</label>
                <input type="datetime-local" class="form-control" id="dateout" name="dateout" value="{{ $booking->dateout ? $booking->dateout->format('Y-m-d\TH:i') : '' }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
    </div>
</body>
</html>
