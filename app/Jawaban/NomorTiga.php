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
	

	public function update (Request $request) {

		// Tuliskan code mengupdate 1 jadwal
		return redirect()->route('event.home');
	}

	public function delete (Request $request) {

		// Tuliskan code menghapus 1 jadwal
		return redirect()->route('event.home');
	}
}

?>