<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function getAll(){
        $events = Event::where('status','publish')->orderBy('id','desc')->paginate(15);

        return view('pages.events.index',compact('events'));
    }

    public function getById($id){
        $event = Event::find($id);
        if (!$event){
            return back()->with(['error'=>'Event not found.']);
        }

        return view('pages.events.event')->with('analysis',$event);
    }

    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(10);

        return view('CMS.dash.events.index', compact('events'));
    }


    public function uploadTinyImg(Request $request) {
        $this->validate($request,[
            'file' => 'required'
        ]);

        $imageName = $request->file->getClientOriginalName();
        $request->file->storeAs('public/images', $imageName);

        return response()->json(['location' => asset('storage/images/'.$imageName)]);
    }

    public function create()
    {
        return view('CMS.dash.events.create');
    }

    public function store(CreateNewsRequest $request)
    {
        $event = new Event();

        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $imageName);

        if ($request->pdf){
            $pdfName = $request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/images', $pdfName);
        }

        $event->author = $request->author ?? 'eacs';
        $event->title = $request->title;
        $event->text = $request->text ?? '/';
        $event->description = $request->description;
        $event->pdf = $pdfName ?? null;
        $event->photo = $imageName;
        $event->status = $request->analysisStatus;
        $event->tags = $request->tags;
        $event->save();



        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function edit($id){
        $event = Event::find($id);
        if ($event){
            return view('CMS.dash.events.edit', compact('event'));
        }

        return back()->with(['error'=>'Event not found.']);
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        $event = Event::find($id);

        if (!$event){
            return back()->with(['error','Analysis not found']);
        }

        if ($request->image){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $imageName);
            File::delete(storage_path('app/public/images/' . $event->photo));

            $event->photo = $imageName;

        }

        if ($request->pdf){
            $pdfName =$request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/pdf', $pdfName);

            File::delete(storage_path('app/public/images/' . $event->pdf));

            $event->pdf = $pdfName;
        }

        $event->author = $request->author;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->text = $request->text;
        $event->status = $request->status;
        $event->tags = $request->tags;
        $event->save();


        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);

        if (File::exists(storage_path('app/public/images/' . $event->photo))) {
            File::delete(storage_path('app/public/images/' . $event->photo));
        }

        $event->delete();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

}
