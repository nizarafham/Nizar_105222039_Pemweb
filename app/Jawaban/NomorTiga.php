<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga {

	public function getData() {
		$data = Event::where('user_id', Auth::id())->get();
		
		return response()->json($data);
	}
	

	public function getSelectedData(Request $request) {
		$data = Event::find($request->id); 
		return response()->json($data); 
	}
	
	public function update(Request $request) {
		$event = Event::find($request->id); 
		
		if ($event) {
			$event->name = $request->name;
			$event->start = $request->start;
			$event->end = $request->end;
			$event->save(); 
	
			return redirect()->route('event.home')->with('message', ['Jadwal berhasil diupdate!', 'success']);
		}
	
		return redirect()->route('event.home')->with('message', ['Gagal mengupdate jadwal.', 'danger']);
	}

	public function delete(Request $request) {
		$event = Event::find($request->id); 
		if ($event) {
			$event->delete(); 
		}
	
		return redirect()->route('event.home');
	}
	
}

?>