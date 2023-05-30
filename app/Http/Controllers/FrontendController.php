<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\GroceryCategory;
use App\Models\FoodProduct;
use App\Models\Vendor;
use App\Models\OrderHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    private $unsplashApiKey = 'ToT1is2qbbUsAxpofvmADyRdf7v1RrE-NsI-E5K83rs';

    public function index()
    {   

    $client = new Client();

    // For new products
    $newProducts = FoodProduct::where('created_at', '>=', now()->subDays(7))
        ->inRandomOrder()
        ->limit(10)
        ->get();

    $productData = collect();

    foreach ($newProducts as $product) {
        $productImage = null;

    // Check if the product has an image
    if ($product->image) {
        // Image exists in the model, use it
        $productImage = $product->image;
    } else {
        // Image doesn't exist in the model, fetch from Unsplash API
        $productImage = $this->unsplash($product->name)['image'];

        // Save the image in the model for future use
        $product->image = $productImage;
        $product->save();
    }

    $productData->push([
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'description' => $product->description,
        'image' => $productImage,
    ]);
    }
  
    // For carousel
    $response = $client->get('https://api.unsplash.com/photos/random', [
         'query' => [
         'count' => 6,
         'query' => 'vegetables',
         'client_id' => $this->unsplashApiKey,
         ],
    ]);

    $groceries = json_decode($response->getBody(), true);

    // For categories
    $groceryCategories = GroceryCategory::all();

    $categoryData = collect();

    foreach ($groceryCategories as $category) {
      $imageData = $this->unsplash($category->name);

    $categoryData->push([
        'name' => $category->name,
        'image' => $imageData['image'],
    ]);
    }
    
    // For popular vendors
        $popularVendors = OrderHistory::select('vendor_id', DB::raw('COUNT(*) as total'))
           ->groupBy('vendor_id')
           ->havingRaw('COUNT(*) > 5')
           ->pluck('vendor_id');

        $vendors = Vendor::whereIn('id', $popularVendors)->get();

        return view('Frontend.home.index', compact('groceries', 'categoryData', 'productData', 'vendors'));
    }

    public function policy()
    {
        return view('Frontend.policy.index');
    }

    public function about()
    {
        return view('Frontend.about.index');
    }

    public function tos()
    {
        return view('Frontend.tos.index');
    }
    
    public function unsplash($name)
    {
    $client = new Client();

    $response = $client->request('GET', 'https://api.unsplash.com/search/photos', [
        'query' => [
            'client_id' => $this->unsplashApiKey,
            'query' => $name,
            'per_page' => 1,
        ],
    ]);

    $body = json_decode($response->getBody(), true);
    $image = $body['results'][0]['urls']['regular'];

    return [
        'name' => $name,
        'image' => $image,
    ];
    }

}