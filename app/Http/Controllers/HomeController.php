<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\About;
use App\Models\Service;
use Faker\Provider\Lorem;
use App\Models\TermsOfUse;
use App\Models\HeroSection;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\HomePageSection;
use App\Models\ContactSectionHeader;
use App\Models\ServiceSectionHeader;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {

        $herosection = HeroSection::select(['title', 'description', 'video'])->first();
        $Homesections = HomePageSection::where('is_active', true)->select(['title', 'sub_title', 'slug', 'image', 'is_active', 'text_position', 'summary_description'])->latest()->take(4)->get();
        $Services = Service::where('is_active', true)->select(['title', 'slug', 'is_active', 'summary_description'])->latest()->take(6)->get();
        $Service_section_header = ServiceSectionHeader::select(['title', 'description'])->first();
        $Contact_section_header = ContactSectionHeader::select(['title', 'description'])->first();

        return view('user.index', compact('herosection', 'Homesections', 'Services', 'Service_section_header', 'Contact_section_header'));
    }

    public function about()
    {
        $about_data = About::select(['about_hero_title', 'about_hero_sub_title', 'about_hero_video', 'about_image', 'about_title', 'about_sub_title', 'about_description'])->first();
        $Service_section_header = ServiceSectionHeader::select(['title', 'description'])->first();
        $Services = Service::where('is_active', true)->select(['title', 'slug', 'is_active', 'summary_description'])->latest()->take(10)->get();
        $team_members = Team::where('is_active', true)
            ->select(['id', 'position', 'first_name', 'last_name', 'image'])
            ->with(['social_media' => function ($query) {
                $query->select(['team_id', 'platform', 'url', 'is_active']);
            }])
            ->get();

        $SocialMedias = SocialMedia::where('is_active', '1')->select(['platform', 'url', 'team_id'])->get();
        return view('user.about', compact('about_data', 'Service_section_header', 'Services', 'team_members', 'SocialMedias'));
    }

    public function explore($slug)
    {
        $about_data = About::select(['about_hero_title', 'about_hero_sub_title', 'about_hero_video', 'about_image', 'about_title', 'about_sub_title', 'about_description'])->first();
        $Service_section_header = ServiceSectionHeader::select(['title', 'description'])->first();
        $Services = Service::where('is_active', true)->select(['title', 'slug', 'is_active', 'summary_description'])->latest()->take(10)->get();
        $team_members = Team::all();
        $Homesection = HomePageSection::select(['title', 'sub_title', 'slug', 'image', 'is_active', 'text_position', 'summary_description', 'full_description', 'background_type', 'background_video'])->where('slug', $slug)->firstOrfail();
        return view('user.explore-page', compact('about_data', 'Service_section_header', 'Services', 'team_members', 'Homesection'));
    }
    public function terms_of_use()
    {
        $terms = TermsOfUse::select(['title', 'background_image', 'description'])->latest()->firstOrfail();
        return view('user.terms-of-use', compact('terms'));
    }
    public function privacy_policy()
    {
        $policies = PrivacyPolicy::select(['title', 'background_image', 'description'])->latest()->firstOrfail();
        return view('user.privacy-policy', compact('policies'));
    }
}
