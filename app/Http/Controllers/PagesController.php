<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\News;
use App\Models\Photo;
use App\Models\Podcast;
use App\Models\Publication;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $news = News::where('status','publish')->orderBy('id','desc')->limit(5)->get();
        $photos = Photo::where('type','home')->orderBy('id')->limit(4)->get();

        $videos = Podcast::orderBy('id','desc')->limit(3)->get();

        return view('pages.index',compact('news','videos','photos'));
    }

    public function aboutUs(){
        $teamMembers = TeamMember::all();
        $videos = Podcast::orderBy('id','desc')->limit(3)->get();
        $photos = Photo::where('type','about-us')->orderBy('id')->limit(3)->get();

        return View('pages.about-us',compact('teamMembers','videos','photos'));
    }

    public function contact(){
        $news = News::where('status','publish')->orderBy('id','desc')->limit(5)->get();

        return View('pages.contact',compact('news'));
    }

    public function search(Request $request){

        $news = News::where('status','publish')->where('title','LIKE','%'. $request->search . '%')->limit(5)->get();

        $analysis = Analysis::where('status','publish')->where('title','LIKE','%'. $request->search . '%')->limit(5)->get();

        $publications = Publication::where('status','publish')->where('title','LIKE','%'. $request->search . '%')->limit(5)->get();


        return view('pages.search',compact('news','analysis','publications'));
    }
}
