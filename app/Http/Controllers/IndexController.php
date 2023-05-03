<?php

namespace App\Http\Controllers;

use App\Models\Awards;
use App\Models\CommunityLinks;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Interests;
use App\Models\Profile;
use App\Models\Skills;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data_profile = Profile::first();
        $social_links = CommunityLinks::first();
        $experience = Experience::get();
        $education = Education::get();
        $skill = Skills::get();
        $interest = Interests::first();
        $awards = Awards::get();
        // dd( $awards );
        return view('index',compact('data_profile','social_links','experience','education','skill','interest','awards'));
    }
}
