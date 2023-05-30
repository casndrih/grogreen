<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    $query = $request->input('q');

    // Perform the search query
    $results = FoodProduct::where('name', 'like', '%'.$query.'%')->get();

    // Return the search results in JSON format
    return response()->json($results);
    }
}