<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

//this does not work lol - i think depreciated 
class TedTalksController extends Controller
{
    public function index()
    {
        // Make request to RapidAPI endpoint and retrieve TED talks
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'ted-talks-api.p.rapidapi.com',
            'X-RapidAPI-Key' => '93762778bfmsh6e144875c579c72p11c56bjsneb80b286093c',
        ])->get('https://ted-talks-api.p.rapidapi.com/talks', [
            'from_record_date' => '2017-01-01',
            'min_duration' => '300',
            'audio_lang' => 'en',
            'subtitle_lang' => 'he',
            'speaker' => 'yuval_noah_harari',
            'topic' => 'politics'
        ]);

        // Check if response is successful
        if ($response->successful()) {
            // Extract TED talks details from the response data
            $data = $response->json();

            $talks = [];
            if (isset($data['result']['results'])) {
                foreach ($data['result']['results'] as $talk) {
                    $talks[] = [
                        'title' => $talk['title'],
                        'description' => $talk['description'],
                        'thumbnail_url' => $talk['thumbnail_url'],
                        'embed_url' => $talk['embed_url']
                    ];
                }
            }
        } else {
            // Handle null response gracefully
            $talks = [];
        }

        // Check if there are no talks found and set an error message
        $error = empty($talks) ? 'No TED talks found.' : '';

        // Pass TED talks details and error message to the view
        return view('welcome', ['talks' => $talks, 'error' => $error]);
    }
}

