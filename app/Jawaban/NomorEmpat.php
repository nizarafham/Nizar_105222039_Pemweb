<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorEmpat {

	public function getJson()
{
    $events = Event::all();
    $data = [];

    foreach ($events as $event) {
        $color = $event->user_id == Auth::id() ? 'blue' : 'gray'; 
        $data[] = [
            'id' => $event->id,
            'title' => $event->name . ' - ' . $event->user->username,
            'start' => $event->start,
            'end' => $event->end,
            'color' => $color
        ];
    }

    return response()->json($data); 
}

}

?>