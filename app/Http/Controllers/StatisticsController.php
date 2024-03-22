<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatisticsController extends Controller
{
    public function getStatistics(Request $request)
    {
        // Make request to the desired API endpoint and retrieve statistics
        $response = Http::get('https://unstats.un.org/sdgapi/v1/sdg/DataAvailability/GetIndicatorsAllCountries', [
            'goalId' => 5, // Specify the goal ID for women and girls in STEM
        ]);
        
        // Check if the response is successful
        if ($response->successful()) {
            // Extract statistics data from the response
            $statistics = $response->json();
        } else {
            // Handle unsuccessful response gracefully
            $statistics = [];
        }
        
        // Pass the statistics data to the view for rendering
        return view('welcome', ['statistics' => $statistics]);
    }
}
