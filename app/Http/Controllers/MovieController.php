<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $apiKey = env('OMDB_API_KEY'); // Store API Key in .env file

        if (!$query) {
            return view('movies.search');
        }

        $response = Http::get("http://www.omdbapi.com/?apikey={$apiKey}&s=" . urlencode($query));
        $movies = $response->json();

        return view('movies.search', ['movies' => $movies['Search'] ?? []]);
    }

    public function addToFavorites($movieId, Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to save favorites.');
    }

    $exists = Favorite::where('user_id', $user->id)->where('movie_id', $movieId)->exists();
    if ($exists) {
        return redirect()->route('movies.search')->with('error', 'Movie is already in favorites.');
    }

    Favorite::create([
        'user_id' => $user->id,
        'movie_id' => $movieId,
        'title' => $request->input('title'),
        'year' => $request->input('year'),
        'poster' => $request->input('poster'),
    ]);

    return redirect()->route('dashboard')->with('success', 'Movie added to favorites.');
}

public function removeFromFavorites($movieId)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to remove favorites.');
    }

    $favorite = Favorite::where('user_id', $user->id)->where('movie_id', $movieId)->first();

    if ($favorite) {
        $favorite->delete();
        return redirect()->route('dashboard')->with('success', 'Movie removed from favorites.');
    }

    return redirect()->route('dashboard')->with('error', 'Movie not found in favorites.');
}


public function dashboard()
{
    $user = Auth::user();
    $favorites = Favorite::where('user_id', $user->id)->get();

    return view('movies.dashboard', compact('favorites'));
}

}
