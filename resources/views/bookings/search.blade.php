<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Booking</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/booking.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <h1>Search Booking by RFID</h1>
        <div class="form-group">
            <label for="rfid">Enter RFID:</label>
            <input type="text" id="rfid" class="form-control" placeholder="Enter RFID">
            <button id="search-btn" class="btn btn-primary mt-2">Search</button>
        </div>
        <div id="booking-results" class="mt-4"></div>
    </div>

    <script>
        document.getElementById('search-btn').addEventListener('click', function() {
            const rfid = document.getElementById('rfid').value;

            fetch(`/bookings/search/${rfid}`)
                .then(response => response.json())
                .then(data => {
                    let resultsHtml = '';
                    if (data.length > 0) {
                        resultsHtml += '<h2>Booking Details:</h2>';
                        resultsHtml += '<ul>';
                        data.forEach(booking => {
                            resultsHtml += `<li>Booking ID: ${booking.booking_id}, Room ID: ${booking.booking_room_id}, Date In: ${booking.datein}, Date Out: ${booking.dateout}</li>`;
                        });
                        resultsHtml += '</ul>';
                    } else {
                        resultsHtml = '<p>No bookings found for this RFID.</p>';
                    }
                    document.getElementById('booking-results').innerHTML = resultsHtml;
                })
                .catch(error => {
                    console.error('Error fetching booking data:', error);
                });
        });
    </script>
</body>
</html>
