<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth; 

class MentorshipController extends Controller
{

    public function index(){
        return view('mentorship.index');
    }



    public function registerMentor(Request $request)
{
    // Retrieve the currently authenticated user
    $user = Auth::user();

    // Find the 'mentor' role
    $mentorRole = Role::where('name', 'mentor')->first();

    // Check if the 'mentor' role exists
    if (!$mentorRole) {
        // Handle the case where the role doesn't exist
        return redirect()->back()->with('error', 'Mentor role not found');
    }

    // Attach the 'mentor' role to the user
    $user->roles()->syncWithoutDetaching([$mentorRole->id]);

    // Redirect the user to their profile with a success message
    return redirect()->route('profiles.index', $user->id)->with('success', 'You have successfully applied to become a mentor.');
}

public function registerMentee(Request $request)
{
    // Retrieve the currently authenticated user
    $user = Auth::user();

    // Find the 'mentee' role
    $menteeRole = Role::where('name', 'mentee')->first();

    // Check if the 'mentee' role exists
    if (!$menteeRole) {
        // Handle the case where the role doesn't exist
        return redirect()->back()->with('error', 'Mentee role not found');
    }

    // Attach the 'mentee' role to the user
    $user->roles()->syncWithoutDetaching([$menteeRole->id]);

    // Redirect the user to their profile with a success message
    return redirect()->route('profiles.index', $user->id)->with('success', 'You have successfully applied to become a mentee.');
}
}
