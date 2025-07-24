<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(Request $requist)
    {
        $user = Auth::user();
        // Logic for the home page of the user dashboard
        if ($user->usertype == 'user') {
            // Return the view for the user dashboard
            return view('dashboard');

        } else {
            // If the user is not an admin, redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        }
    }

    public function index(Request $requist)
    {
        $user = Auth::user();
        // Logic for the admin dashboard
        if ($user->usertype == 'admin') {
            // Return the view for the admin dashboard
            return view('admin.dashboard');

        } else {
            // If the user is not an admin, redirect to the user dashboard
            return redirect()->route('dashboard');
        }
    }

    public  function post()
    {
        // Logic for the post management page
        return view('admin.post');
    }
}
