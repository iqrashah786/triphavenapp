<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Route;
use App\Models\Station;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function confirmseat($route_id)
    {

        try {

            $fares = Route::where('route_id', $route_id)->firstOrFail();
            $station = Station::findOrFail($fares->station_id);
            $date = Route::where('route_id', $route_id)->firstOrFail();
            // $user = auth()->user();
            $user = Auth::user();
$user_id = $user->id;
$booking = Booking::create(
    [
'user_id'=>$user_id,
'route_id'=>$route_id,
'station_id'=>$fares->station_id
    ]
    );

            \Mail::to($user->email)->send(new \App\Mail\BookingConfirmed($fares, $station, $user , $booking));

            return view('Front.confirm', compact('fares', 'station'));
        } catch (\Exception $e) {
            throw $e;
            \Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while confirming your booking.');
        }
    }
    public function confirmBooking( $bookingid){

        $booking = Booking::findOrFail($bookingid);


    $booking->status = 'confirmed';
    $booking->save();

    return redirect()->back()->with('success', 'Booking status updated successfully!');
         }
    public function rejectedBooking( $bookingid){

        $booking = Booking::findOrFail($bookingid);

    $booking->status = 'rejected';
    $booking->save();

    return redirect()->back()->with('success', 'Booking status updated successfully!');
         }



        public function updateStatus(Request $request)
    {
        $booking = Booking::where('status', 'pending')->get();

        return view('Admin.reqbooking', compact('booking'));
        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }

    public function acceptedBookings()
    {

        $booking = Booking::where('status', 'confirmed')->get();


        return view('Admin.accepted', compact('booking'));
    }
    public function rejectedBookings()
    {

        $booking = Booking::where('status', 'rejected')->get();


        return view('Admin.rejected', compact('booking'));
    }

}
