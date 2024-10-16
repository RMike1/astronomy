<?php

namespace App\Http\Controllers;

use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\HeroSection;
use App\Models\HomePageSection;
use App\Models\Service;
use App\Models\ServiceSectionHeader;
use App\Models\ContactSectionHeader;

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
        $Homesections=HomePageSection::where('is_active',true)->select(['title','sub_title','slug','image','is_active','text_position','summary_description'])->latest()->take(4)->get();
        $Homesections=HomePageSection::where('is_active',true)->select(['title','sub_title','slug','image','is_active','text_position','summary_description'])->latest()->take(4)->get();
        $Services=Service::where('is_active',true)->select(['title','slug','is_active','summary_description'])->latest()->take(6)->get();
        $Service_section_header = ServiceSectionHeader::select(['title', 'description'])->first();
        $Contact_section_header = ContactSectionHeader::select(['title', 'description'])->first();
        return view('user.index',compact('herosection','Homesections','Services','Service_section_header','Contact_section_header'));
    }


}
