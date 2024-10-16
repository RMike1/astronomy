<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){

        // $accessKey = env('UNSPLASH_ACCESS_KEY');
        
        // $url = 'https://api.unsplash.com/photos/random';

        // $response = Http::get($url, [
        //     'client_id' => $accessKey,
        //     'count' => 1, // Number of random images to fetch
        // ]);

        // $image = $response->json()[0];

        // $imageUrl = $image['urls']['regular'];

        // dd($imageUrl);

        $herosection = HeroSection::select(['title', 'description', 'video'])->first();
        return view('user.index',compact('herosection'));
    }


}
