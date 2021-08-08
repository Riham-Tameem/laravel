<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function lang($lang){
        $lang = strtolower($lang);
        if(!($lang=='ar' || $lang=='en')){
            $lang='ar';
        }
        return redirect()->back()->cookie(
            'lang', $lang, 60*24*365*3
        );
    }
    function index(){
        return view("home.welcome");
    }
    function contact(){
        return view("home.contact");
    }
    function about(){
        $title = 'About us';
        $details = 'Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here Some text go here ';
        $image = 'https://cdn.searchenginejournal.com/wp-content/uploads/2019/01/Top-10-Ranking-About-Us-Pages.png';
        $contacts = [
            'Email'=>'info@aa.com',
            'Phone'=>'+972 599 6262262',
            'Address'=>'Gaza, Shohadaa Street'
        ];
        /*return view("home.about")
            ->with('title',$title)
            ->with('details',$details)
            ->with('image',$image)
            ->with('contacts',$contacts);*/
            
        /*return view("home.about")
            ->with($title)
            ->withDetails($details)
            ->withImage($image)
            ->withContacts($contacts);*/
        return view("home.about2",compact('title','details','image','contacts'));
    }
}
