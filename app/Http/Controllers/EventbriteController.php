<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventbriteController extends Controller
{
    public function index()
    {
        // Make request to RapidAPI endpoint to fetch technology events
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'real-time-events-search.p.rapidapi.com',
            'X-RapidAPI-Key' => '6df2a8a016msh4a6435bb84d1024p19b4dbjsn224da9b21ffa',
        ])->get('https://real-time-events-search.p.rapidapi.com/search-events', [
            'query' => 'code',
            'start' => 0, // Start index for pagination, adjust as needed
        ]);
    
        // Check if the response is successful
        if ($response->successful()) {
            // Extract the JSON data from the response
            $responseData = $response->json();
    
            // Check if the status is successful
            if (isset($responseData['status']) && $responseData['status'] === 'OK') {
                // Extract event details from the data array
                $eventDetails = isset($responseData['data']) ? $responseData['data'] : [];
            } else {
                // Handle the case when the status is not successful
                // For example, log an error message or handle it gracefully
                $eventDetails = [];
            }
        } else {
            // Handle the case when the response is not successful
            // For example, log an error message or handle it gracefully
            $eventDetails = [];
        }

        //testing
        // dd($response->json());
        // dd($eventDetails);
    
        // Pass event details to the view
        return view('events.index', ['eventDetails' => $eventDetails]);
    }


    // public function save(Request $request)
    // {
    //     // Get the authenticated user
    //     $user = Auth::user();

    //     // Validate the request data if needed

    //     // Save the event details to the database
    //     DB::table('user_events')->insert([
    //         'user_id' => $user->id,
    //         'name' => $request->input('event_name'),
    //         'start_time' => $request->input('start_time'),
    //         'venue_address' => $request->input('venue_address'),
    //         'link' => $request->input('event_link'),
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     // Redirect back or to a specific route
    //     return back()->with('success', 'Event saved successfully.');
    // }

}
