<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnnouncementController extends Controller
{
    public function getAll(){
        $announcements = Announcement::where('status','publish')->orderBy('id','desc')->paginate(10);

        return view('pages.announcement.index')->with('announcements',$announcements);
    }

    public function getById($id){
        $announcement = Announcement::find($id);

        if ($announcement){
            return view('pages.announcement.announcement')->with('announcement',$announcement);
        }

        return back()->with(['error'=>'Announcement not found.']);
    }

    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(15);

        return view('CMS.dash.announcement.index', compact('announcements'));
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
        return view('CMS.dash.announcement.create');
    }

    public function store(CreateNewsRequest $request)
    {
        $announcement = new Announcement();

        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $imageName);

        if ($request->pdf){
            $pdfName = $request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/images', $pdfName);
        }

        $announcement->author = $request->author ?? 'eacs';
        $announcement->title = $request->title;
        $announcement->text = $request->text ?? '/';
        $announcement->description = $request->description;
        $announcement->pdf = $pdfName ?? null;
        $announcement->photo = $imageName;
        $announcement->status = $request->status;
        $announcement->tags = $request->tags;

        $announcement->save();



        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function edit($id){
        $announcement = Announcement::find($id);

        if ($announcement){
            return view('CMS.dash.announcement.edit', compact('announcement'));
        }

        return back()->with(['error'=>'Announcement not found.']);
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        $announcement = Announcement::find($id);

        if (!$announcement){
            return back()->with(['error','Announcement not found']);
        }

        if ($request->image){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $imageName);
            File::delete(storage_path('app/public/images/' . $announcement->photo));

            $announcement->photo = $imageName;

        }

        if ($request->pdf){
            $pdfName =$request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/pdf', $pdfName);

            File::delete(storage_path('app/public/images/' . $announcement->pdf));

            $announcement->pdf = $pdfName;
        }

        $announcement->author = $request->author;
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->text = $request->text;
        $announcement->status = $request->status;
        $announcement->tags = $request->tags;
        $announcement->save();


        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function delete($id)
    {
        $announcement = Announcement::findOrFail($id);

        if (File::exists(storage_path('app/public/images/' . $announcement->photo))) {
            File::delete(storage_path('app/public/images/' . $announcement->photo));
        }

        $announcement->delete();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

}
