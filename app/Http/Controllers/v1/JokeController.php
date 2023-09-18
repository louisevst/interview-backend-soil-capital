<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Fetch Jokes
 * @return JsonResponse
 */

class JokeController extends Controller
{
    public function fetchDataFromExternalAPI()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke'); // Replace with the actual API URL

        if ($response->successful()) {
            $data = $response->json();

            return response()->json($data);
        } else {
            return response()->json(['error' => 'Failed to fetch data from the joke API'], 500);
        }
    }
}
