<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{
    public function index(){
        $photos = Photo::paginate(15);

        return view('CMS.dash.photos.index',compact('photos'));
    }

    public function create(){
        return view('CMS.dash.photos.create');
    }

    public function store(Request $request){
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $photo = new Photo();
        $photo->photo = $imageName;
        $photo->type = $request->type;

        $photo->save();

        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function delete($id){
        $photo = Photo::findOrFail($id);

        if (File::exists(storage_path('app/public/images/' . $photo->photo))) {
            File::delete(storage_path('app/public/images/' . $photo->photo));
        }

        $photo->delete();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }
}
