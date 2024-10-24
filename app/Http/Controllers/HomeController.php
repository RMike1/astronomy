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
use App\Models\About;
use App\Models\Team;
use App\Models\TermsOfUse;
use App\Models\PrivacyPolicy;

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
        $Services=Service::where('is_active',true)->select(['title','slug','is_active','summary_description'])->latest()->take(6)->get();
        $Service_section_header = ServiceSectionHeader::select(['title', 'description'])->first();
        $Contact_section_header = ContactSectionHeader::select(['title', 'description'])->first();
        
        return view('user.index',compact('herosection','Homesections','Services','Service_section_header','Contact_section_header'));
    }

    public function about(){
        $about_data = About::select(['about_hero_title', 'about_hero_sub_title', 'about_hero_video','about_image','about_title','about_sub_title','about_description'])->first();
        $Service_section_header = ServiceSectionHeader::select(['title', 'description'])->first();
        $Services=Service::where('is_active',true)->select(['title','slug','is_active','summary_description'])->latest()->take(10)->get();
        $team_members=Team::all();
        return view('user.about',compact('about_data','Service_section_header','Services','team_members'));
    }

    public function explore($slug){
        $about_data = About::select(['about_hero_title', 'about_hero_sub_title', 'about_hero_video','about_image','about_title','about_sub_title','about_description'])->first();
        $Service_section_header = ServiceSectionHeader::select(['title', 'description'])->first();
        $Services=Service::where('is_active',true)->select(['title','slug','is_active','summary_description'])->latest()->take(10)->get();
        $team_members=Team::all();
        $Homesection=HomePageSection::select(['title','sub_title','slug','image','is_active','text_position','summary_description','full_description','background_type','background_video'])->where('slug',$slug)->firstOrfail();
        return view('user.explore-page',compact('about_data','Service_section_header','Services','team_members','Homesection'));
    }
    public function terms_of_use(){
        $terms=TermsOfUse::select(['title','background_image','description'])->latest()->firstOrfail();
        return view('user.terms-of-use',compact('terms'));
    }
    public function privacy_policy(){
        $policies=PrivacyPolicy::select(['title','background_image','description'])->latest()->firstOrfail();
        return view('user.privacy-policy',compact('policies'));
    }


}
