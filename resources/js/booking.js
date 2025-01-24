// This file contains AJAX functions for handling CRUD operations for bookings.

$(document).ready(function() {
    // Create booking
    $('#createBookingForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/bookings',
            data: $(this).serialize(),
            success: function(response) {
                // Handle success response
                alert('Booking created successfully!');
                location.reload();
            },
            error: function(xhr) {
                // Handle error response
                alert('Error creating booking: ' + xhr.responseText);
            }
        });
    });

    // Edit booking
    $('.editBooking').on('click', function() {
        var bookingId = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: '/bookings/' + bookingId + '/edit',
            success: function(response) {
                // Populate the edit form with booking data
                $('#editBookingForm').find('input[name="booking_id"]').val(response.id);
                $('#editBookingForm').find('input[name="booking_room_id"]').val(response.booking_room_id);
                $('#editBookingForm').find('input[name="booking_package_id"]').val(response.booking_package_id);
                $('#editBookingForm').find('input[name="date"]').val(response.date);
                $('#editBookingForm').find('input[name="booking_expired"]').val(response.booking_expired);
                $('#editBookingForm').find('input[name="month"]').val(response.month);
                $('#editBookingForm').find('input[name="year"]').val(response.year);
                $('#editBookingForm').find('input[name="booking_status"]').val(response.booking_status);
                $('#editBookingForm').find('textarea[name="request"]').val(response.request);
                $('#editBookingModal').modal('show');
            }
        });
    });

    // Update booking
    $('#editBookingForm').on('submit', function(e) {
        e.preventDefault();
        var bookingId = $(this).find('input[name="booking_id"]').val();
        $.ajax({
            type: 'PUT',
            url: '/bookings/' + bookingId,
            data: $(this).serialize(),
            success: function(response) {
                // Handle success response
                alert('Booking updated successfully!');
                location.reload();
            },
            error: function(xhr) {
                // Handle error response
                alert('Error updating booking: ' + xhr.responseText);
            }
        });
    });

    // Delete booking
    $('.deleteBooking').on('click', function() {
        var bookingId = $(this).data('id');
        if (confirm('Are you sure you want to delete this booking?')) {
            $.ajax({
                type: 'DELETE',
                url: '/bookings/' + bookingId,
                success: function(response) {
                    // Handle success response
                    alert('Booking deleted successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    // Handle error response
                    alert('Error deleting booking: ' + xhr.responseText);
                }
            });
        }
    });

    // Search booking by RFID
    $('#searchBookingForm').on('submit', function(e) {
        e.preventDefault();
        var rfid = $(this).find('input[name="rfid"]').val();
        $.ajax({
            type: 'GET',
            url: '/bookings/search',
            data: { rfid: rfid },
            success: function(response) {
                // Display search results
                $('#searchResults').html(response);
            },
            error: function(xhr) {
                // Handle error response
                alert('Error searching booking: ' + xhr.responseText);
            }
        });
    });
});
