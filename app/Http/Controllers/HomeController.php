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
use App\Models\TeamSectionHeader;
use App\Models\ContactSectionHeader;
use App\Models\ServiceSectionHeader;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {

        $herosection = HeroSection::select(['title', 'description', 'video','sub_title'])->first();
        $Homesections = HomePageSection::where('is_active', true)->select(['title', 'sub_title', 'slug', 'image', 'is_active', 'text_position', 'summary_description'])->latest()->take(5)->get();
        $Services = Service::where('is_active', true)->select(['title', 'slug', 'is_active', 'summary_description'])->latest()->take(6)->get();
        $Service_section_header = ServiceSectionHeader::select(['title', 'sub_title','description'])->first();
        $Contact_section_header = ContactSectionHeader::select(['title','sub_title', 'description'])->first();
        $Team_section_header = TeamSectionHeader::select(['title','sub_title', 'description'])->first();


        return view('user.index', compact('herosection', 'Homesections', 'Services', 'Service_section_header', 'Contact_section_header','Team_section_header'));
    }

    public function about()
    {
        $about_data = About::select(['about_hero_title', 'about_hero_sub_title', 'about_hero_video', 'about_image', 'about_title', 'about_sub_title', 'about_description'])->first();
        $Service_section_header = ServiceSectionHeader::select(['title','sub_title', 'description'])->first();
        $Team_section_header = TeamSectionHeader::select(['title','sub_title', 'description'])->first();
        $Services = Service::where('is_active', true)->select(['title', 'slug', 'is_active', 'summary_description'])->latest()->take(10)->get();
        $team_members = Team::where('is_active', true)
            ->select(['id', 'position', 'first_name', 'last_name', 'image'])
            ->with(['social_media' => function ($query) {
                $query->select(['team_id', 'platform', 'url', 'is_active']);
            }])
            ->get();

        $SocialMedias = SocialMedia::where('is_active', '1')->select(['platform', 'url', 'team_id'])->get();
        return view('user.about', compact('about_data', 'Service_section_header', 'Services', 'team_members', 'SocialMedias','Team_section_header'));
    }

    public function explore($slug)
    {
        $about_data = About::select(['about_hero_title', 'about_hero_sub_title', 'about_hero_video', 'about_image', 'about_title', 'about_sub_title', 'about_description'])->first();
        $Service_section_header = ServiceSectionHeader::select(['title', 'sub_title','description'])->first();
        $Services = Service::where('is_active', true)->select(['title', 'slug', 'is_active', 'summary_description'])->latest()->take(10)->get();
        $team_members = Team::all();
        $Homesection = HomePageSection::select(['title', 'sub_title', 'slug', 'image', 'is_active', 'text_position', 'summary_description', 'full_description', 'background_type', 'background_video','meta_title','meta_keyword','meta_description','meta_image','more_seo_metadata','social_media_seo_meta_data'])->where('slug', $slug)->firstOrfail();
        $moreSeoMetadata = $Homesection->more_seo_metadata ?? [];
        $socialMediaSeoMetaData = $Homesection->social_media_seo_meta_data ?? [];
        return view('user.explore-page', compact('about_data', 'Service_section_header', 'Services', 'team_members', 'Homesection','moreSeoMetadata','socialMediaSeoMetaData'));
    }
    public function terms_of_use()
    {
        $terms = TermsOfUse::select(['title', 'background_image', 'description','sub_title','meta_title','meta_keyword','meta_description','meta_image','more_seo_metadata','social_media_seo_meta_data'])->latest()->firstOrfail();
        $moreSeoMetadata = $terms->more_seo_metadata ?? [];
        $socialMediaSeoMetaData = $terms->social_media_seo_meta_data ?? [];
        return view('user.terms-of-use', compact('terms','moreSeoMetadata','socialMediaSeoMetaData'));
    }
    public function privacy_policy()
    {
        $policies = PrivacyPolicy::select(['title', 'background_image', 'description','sub_title','meta_title','meta_keyword','meta_description','meta_image','more_seo_metadata','social_media_seo_meta_data'])->latest()->firstOrfail();
        $moreSeoMetadata = $policies->more_seo_metadata ?? [];
        $socialMediaSeoMetaData = $policies->social_media_seo_meta_data ?? [];
        return view('user.privacy-policy', compact('policies','moreSeoMetadata','socialMediaSeoMetaData'));
    }
}
