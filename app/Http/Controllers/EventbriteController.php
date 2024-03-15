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
            'X-RapidAPI-Key' => '93762778bfmsh6e144875c579c72p11c56bjsneb80b286093c',
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
