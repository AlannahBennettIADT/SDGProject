<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;


//this is from the UNStats API - uses cURL instead of HTML request

class StatisticsController extends Controller
{
    public function getStatistics()
    {
        try {
            // Initialize cURL session
            $ch = curl_init();
    
            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, 'https://unstats.un.org/sdgapi/v1/sdg/DataAvailability/GetIndicatorsAllCountries');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
                'dataPointType' => 10,
                'countryId' => 0,
                'natureOfData' => 'All',
            ]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json',
            ]);
    
            // Execute cURL request
            $response = curl_exec($ch);
    
            // Check for errors
            if ($response === false) {
                $error = curl_error($ch);
                curl_close($ch);
                return "cURL error: $error";
            }
    
            // Close cURL session
            curl_close($ch);
    
            // Process response
            $jsonResponse = json_decode($response, true);

            // Check if response is valid
            if (!is_array($jsonResponse)) {
                return "Invalid response format";
            }
            
            // Filter data based on goalId = 5
            $goalId = 5;
            $filteredData = array_filter($jsonResponse, function ($value) use ($goalId) {
                return isset($value['goalId']) && $value['goalId'] == $goalId;
            });
            
            $statistics = collect($filteredData);
           
            
            // Pass the statistics collection to the view for rendering
            return $statistics;
        } catch (\Exception $e) {
            // Handle exception
            return $e->getMessage();
        }
    }
}
