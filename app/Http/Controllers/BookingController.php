<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }
    public function getBookingsData()
    {
        $bookings = Booking::query();

        // if (request()->has('rfid')) {
        //     $bookings->where('rfid', request('rfid'));
        // }

        return Datatables::of($bookings->get())
            ->addColumn('actions', function($booking){
            $html = "<button type='button' class='btn btn-primary edit-btn' ";
            $html .= "onclick=\"showEditBookingModal({$booking->booking_id })\">";
            $html .= "Edit</button>";
            return $html;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function showBookings()
    {
        return view('bookings.show');
    }


    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_room_id' => 'required|string|max:50',
            'booking_package_id' => 'required|string|max:100',
            'date' => 'nullable|date',
            'booking_expired' => 'nullable|string|max:50',
            'month' => 'nullable|integer',
            'year' => 'nullable|integer',
            'booking_status' => 'nullable|string|max:50',
            'request' => 'nullable|string',
            'booking_customer_id' => 'nullable|string|max:100',
            'rfid' => 'required|string|max:100',
            'datein' => 'nullable|date',
            'dateout' => 'nullable|date',
            'pendamping' => 'nullable|string|max:100'
        ]);

        Booking::create($request->all());

        return response()->json(['success' => 'Booking created successfully.']);
    }

    public function edit($id)
    {
        $booking = Booking::where('booking_id', $id)->first();
        return response()->json($booking);
    }

    public function update(Request $request)
    {
        $request->validate([
            'booking_room_id' => 'required|string|max:50',
            'booking_package_id' => 'required|string|max:100',
            'date' => 'nullable|date',
            'booking_expired' => 'nullable|string|max:50',
            'month' => 'nullable|integer',
            'year' => 'nullable|integer',
            'booking_status' => 'nullable|string|max:50',
            'request' => 'nullable|string',
            'booking_customer_id' => 'nullable|string|max:100',
            'rfid' => 'required|string|max:100',
            'datein' => 'nullable|date',
            'dateout' => 'nullable|date',
            'pendamping' => 'nullable|string|max:100'
        ]);

        $booking = Booking::where('booking_id', $request->booking_id)->first();
        // dd($booking);die;
        $booking->update([
            'dateout' => now(),
            'booking_status' => $request->booking_status,
        ]);

        return response()->json(['success' => 'Booking updated successfully.']);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['success' => 'Booking deleted successfully.']);
    }
}
