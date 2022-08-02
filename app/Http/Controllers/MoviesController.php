<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateInputRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Listing movies
 * Searching movies
 */

class MoviesController extends Controller
{
    /**
     * fetching movies from the api
     */
    public function getMovies(Request $request)
    {
        // apiKey from config.
        $apiKey = config('services.movie.apikey');
        $apiURL = "https://www.omdbapi.com/?apikey=" . $apiKey . "&s=red";
        $response = Http::get($apiURL)->json();
        $result = $response['Search'];
        // return to the view with the resul as array
        return view('index', ['result' => $result]);
    }

    /**
     * Search API based on user input
     */
    public function search(Request $request)
    {
        // get input from user

        $keyword = $request->keyword;
        $apiKey = config('services.movie.apikey');
        $apiURL = "https://www.omdbapi.com/?apikey=" . $apiKey . "&s=" . $keyword;
        $response = Http::get($apiURL)->json();
        // If search results found
        if (isset($response['Search'])) {
            $result = $response['Search'];
            $find = 'blue,red,yellow,green';
            // matching string logic and apply background color 
            foreach ($result as $key => $res) {
                $str  = $result[$key]['Title'];
                $pattern = str_replace(',', '|', $find);
                preg_match('#' . $pattern . '#i', $str, $match);
                if (isset($match[0])) {
                    $result[$key]['Title'] = str_ireplace($match[0], "<span style='background-color:" . $match[0] . "'>" . $match[0] . "</span>", $result[$key]['Title']);
                }
            }
            echo "</pre>";
            return view('search', ['result' => $result]);
        }
        // if no results
        return view('search', ['result' => "No result found"]);
    }
}
