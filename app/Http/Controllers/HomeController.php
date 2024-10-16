<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $herosection = HeroSection::select(['title', 'description', 'video'])->first();
        return view('user.index',compact('herosection'));
    }
}
