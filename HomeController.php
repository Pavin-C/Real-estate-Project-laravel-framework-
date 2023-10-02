<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use Exception;

class HomeController extends Controller
{
    public function index()
{
    try {
     $property = Property::where('approval','=',1)
                           ->orderBy('id','desc')
                           ->take(4)
                           ->get();
       $users = User::whereHas('properties')->take(3)->get();                            
        return view('home.index',compact(['property','users']));
    } catch(\Exception $error) {
        return view('error.500');
    }
}

public function about() {
    return view('home.about');
}

public function agent() {
    try {
        $sellers = User::whereHas('properties')->paginate(10);       
    return view('home.agents-grid',compact('sellers'));
    } catch(\Exception $error) {
        return view('error.500');
    }
}

public function siteMap()
{
    try {
        $site = Property::select('address')->where('approval',1)->get();
        return view('sitemap.sitemap',compact('site'));

    } catch(\Exception $error) {
        return view('error.500');
    }
}
}
