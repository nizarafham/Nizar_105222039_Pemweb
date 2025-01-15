<?php

namespace App\Jawaban;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class NomorSatu {

	public function auth(Request $request)
	{
		$request->validate([
			'login_identifier' => 'required',
			'password' => 'required',
		]);

		$loginIdentifier = $request->input('login_identifier');
		$password = $request->input('password');

		$loginType = filter_var($loginIdentifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (Auth::attempt([$loginType => $loginIdentifier, 'password' => $password])) {
			return redirect()->route('event.home')->with('message', ['Login successful!', 'success']);;
		}

		return redirect()->back()->with('message', ['Invalid credentials.', 'danger']);;
	}

	public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('event.home')->with('success', 'Registration successful! Please login.');
    }

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		$request->session()->flash('status', 'success');
		$request->session()->flash('message', 'You have successfully logged out.');
		return redirect()->route('event.home');
	}
}

?>