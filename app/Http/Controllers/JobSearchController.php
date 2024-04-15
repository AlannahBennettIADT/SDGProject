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
            'X-RapidAPI-Key' => '6df2a8a016msh4a6435bb84d1024p19b4dbjsn224da9b21ffa',
        ])->get('https://jsearch.p.rapidapi.com/search', [
            'query' => $query,
            'page' => 1, 
            'num_pages' => 5, 
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


