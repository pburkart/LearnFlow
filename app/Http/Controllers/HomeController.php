<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function index()
	{
		$paths = auth()->check() ? auth()->user()->learningPaths : [];
		return view('home', compact('paths'));
	}
	
	public function profile()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view your profile.');
        }
        return view('profile.index', compact('user'));
    }
}