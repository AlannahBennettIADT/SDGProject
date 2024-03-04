<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobSearchController extends Controller
{
    public function search(Request $request)
    {
        // Retrieve search query from request
        $query = $request->input('query');
        
        // Make request to RapidAPI endpoint and retrieve search results
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'jsearch.p.rapidapi.com',
            'X-RapidAPI-Key' => '93762778bfmsh6e144875c579c72p11c56bjsneb80b286093c',
        ])->get('https://jsearch.p.rapidapi.com/search', [
            'query' => $query,
            'page' => 1, // Adjust as needed
            'num_pages' => 5, // Adjust as needed
        ]);
    
        // Check if response is successful
        if ($response->successful()) {
            // Extract job details from the response data
            $jobDetails = $response->json()['data'];
        } else {
            // Handle null response gracefully
            $jobDetails = [];
        }
    
        // Pass job details to the view
        return view('jobboard.index', ['jobDetails' => $jobDetails]);
    }
    
}


