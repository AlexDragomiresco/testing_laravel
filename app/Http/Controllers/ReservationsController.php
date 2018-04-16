<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client as Client;
use App\Room as Room;
use App\Reservation as Reservation;

class ReservationsController extends Controller
{
    public function bookRoom($client_id, $room_id, $data_in, $date_out)
    {
        $reservation = new Reservation();
        $client_instance = new Client();
        $room_instance = new Room();

        $client = $client_instance->find($client_id);
        $room = $room_instance->find($room_id);
        $reservation->date_in = $date_in;
        $reservation->date_out = $date_out;

        $reservation->room()->assciate($room);
        $reservation->client()->assciate($client);

        if($room_instance->isRoomBooked($room_id, $date_in, $date_out)){
            abort('The room is already booked');
        } else {
            $reservation->save();
        }

        return redirect()->route('clients');
    }
}
