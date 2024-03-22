<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        // dd($response->json());
        // dd($eventDetails);
    
        // Pass event details to the view
        return view('events.index', ['eventDetails' => $eventDetails]);
    }
}
