<?php

namespace App\Http\Controllers;

use App\Models\Actual;
use App\Models\Photo;
use App\Models\Podcast;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class PodcastController extends Controller
{
    public function getVideos(){
        $videos = Podcast::paginate(15);

        return view('pages.video')->with('videos',$videos);
    }

    public function index()
    {
        $podcasts = Podcast::orderBy('id', 'desc')->paginate(10);
        return view('CMS.dash.podcast.index', compact('podcasts'));
    }

    public function create()
    {
        return view('CMS.dash.podcast.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'guest' => 'string|max:255'
        ]);

        $podcast = new Podcast();

        $podcast->title = $request->title;
        $podcast->text = $request->text;
        $podcast->video = $request->video;
        $podcast->guest = $request->guest ?? 'eacs';
        $podcast->save();


        return redirect()->back()->with('success', 'Successfully created!');

    }

    public function edit($id)
    {
        $podcast = Podcast::find($id);

        if ($podcast){
            return back()->with(['error'=>'Video not found.']);
        }
        return view('CMS.dash.podcast.edit', compact('podcast'));

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'guest' => 'required|string|max:255'
        ]);


        $podcast = Podcast::find($request->podcastId);

        $podcast->title = $request->title;
        $podcast->text = $request->text;
        $podcast->video = $request->video;
        $podcast->guest = $request->guest;
        $podcast->save();

        return redirect()->back()->with('success', 'Successfully updated!');

    }

    public function destroy(Request $request)
    {
        $podcast = Podcast::find($request->podcastId);

        if ($podcast){
            $podcast->delete();
            return redirect()->back()->with('success', 'Successfully deleted!');
        }

        return redirect()->back();
    }
}
