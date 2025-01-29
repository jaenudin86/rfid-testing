@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Guest List    </h1>
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookingModal">
            Add New Guest
        </button>
    </div>
    <div class="mb-3">
        <label for="search_rfid" class="form-label">Search by Kartu</label>
        <input type="text" class="form-control" id="search_rfid" placeholder="Enter RFID">
    </div>
    <table class="table" id="booking-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Nama Samaran Tamu</th>
                <th>Kode Gelang</th>
                <th>Nomor Room</th>
                <th>Jenis Layanan</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>


<!-- Add Booking Modal -->
<div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addBookingForm" method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookingModalLabel">Add New Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="booking_customer_id" class="form-label">Nama Samaran Tamu</label>
                        <input type="text" class="form-control" id="booking_customer_id" name="booking_customer_id" required>
                    </div>

                    <div class="mb-3">
                        <label for="room_id" class="form-label">Nomor Room                        </label>
                        <input type="text" class="form-control" id="booking_room_id" name="booking_room_id" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="package_id" class="form-label">Jenis Layanan</label>
                        <input type="text" class="form-control" id="booking_package_id" name="booking_package_id" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="booking_package_id" class="form-label">Jenis Layanan</label>
                        <select class="form-control" id="booking_package_id" name="booking_package_id" required>
                            <option value="Layanan 1">Layanan 1</option>
                            <option value="Layanan 2">Layanan 2</option>
                            <option value="Layanan 3">Layanan 3</option>
                            <option value="Layanan 4">Layanan 4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Waktu</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="booking_status" name="booking_status" required>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="rfid" class="form-label">Kode Gelang</label>
                        <input type="text" class="form-control" id="rfid" name="rfid" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pendamping" class="form-label">Kode Pendamping</label>
                    <input type="text" class="form-control" id="pendamping" name="pendamping">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Booking Modal -->
<div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editBookingForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookingModalLabel">Edit Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_booking_id" name="booking_id">
                    <div class="mb-3">
                        <label for="edit_booking_customer_id" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="edit_booking_customer_id" name="booking_customer_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_rfid" class="form-label">RFID</label>
                        <input type="text" class="form-control" id="edit_rfid" name="rfid" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_booking_room_id" class="form-label">Room ID</label>
                        <input type="text" class="form-control" id="edit_booking_room_id" name="booking_room_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_booking_package_id" class="form-label">Package ID</label>
                        <input type="text" class="form-control" id="edit_booking_package_id" name="booking_package_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="edit_date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_booking_status" class="form-label">Status</label>
                        <select class="form-control" id="edit_booking_status" name="booking_status" required>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script>
    function editBooking(booking) {
        $('#edit_booking_id').val(booking.booking_id);
        $('#edit_booking_customer_id').val(booking.booking_customer_id);
        $('#edit_rfid').val(booking.rfid);
        $('#edit_booking_room_id').val(booking.booking_room_id);
        $('#edit_booking_package_id').val(booking.booking_package_id);
        $('#edit_date').val(booking.date);
        $('#edit_booking_status').val(booking.booking_status);
        $('#editBookingForm').attr('action', '{{ route('bookings.update', '') }}/' + booking.booking_id);
        $('#editBookingModal').modal('show');
    }

    $('#editBookingForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                $('#editBookingModal').modal('hide');
                $('#booking-table').DataTable().ajax.reload();
                alert('Booking updated successfully');
            },
            error: function(xhr) {
                alert('An error occurred while updating the booking');
            }
        });
    });

    // Example of fetching booking data and calling editBooking function
    function showEditBookingModal(bookingId) {
        console.log('Fetching booking data for booking ID:', bookingId);

        $.ajax({
            url: '{{ route('bookings.edit', '') }}/' + bookingId,
            method: 'GET',
            success: function(response) {
                // Assuming response contains the booking data
                editBooking(response);
            },
            error: function(error) {
                console.error('Error fetching booking data:', error);
            }
        });
    }
    $(document).ready(function() {
        $(document).ready(function() {
            var table = $('#booking-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('bookings.datatable') }}',
                    data: function(d) {
                        d.rfid = $('#search_rfid').val();
                    }
                },
                columns: [
                    { data: 'booking_id', name: 'booking_id' },
                    { data: 'rfid', name: 'rfid' },
                    { data: 'booking_room_id', name: 'booking_room_id' },
                    { data: 'booking_package_id', name: 'booking_package_id' },
                    { data: 'date', name: 'date' },
                    { data: 'booking_status', name: 'booking_status' },
                    { data: 'actions', name: 'actions'}
                ]
            });

            $('#search_rfid').on('keyup', function() {
                table.draw();
            });
        });
    });
    $('#addBookingForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                $('#addBookingModal').modal('hide');
                $('#booking-table').DataTable().ajax.reload();
                alert('Booking added successfully');
            },
            error: function(xhr) {
                alert('An error occurred while adding the booking');
            }
        });
    });
</script>
@endsection
