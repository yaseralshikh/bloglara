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

    public function create()
    {
        // Logic to show the form for creating a new resource
        return view('admin.createpost');
    }
    public function store(Request $request)
    {
        // Logic to store a newly created resource in storage
    }
    public function show($id)
    {
        // Logic to display a specific resource
        return view('admin.showpost', ['id' => $id]);
    }
    public function edit($id)
    {
        // Logic to show the form for editing a specific resource
        return view('admin.editpost', ['id' => $id]);
    }
    public function update(Request $request, $id)
    {
        // Logic to update a specific resource in storage
    }
    public function destroy($id)
    {
        // Logic to remove a specific resource from storage
    }
}
