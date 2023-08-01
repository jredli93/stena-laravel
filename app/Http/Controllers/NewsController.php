<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function getAll(){
        $news = News::where('status','publish')->orderBy('id','desc')->paginate(15);;

        return view('pages.news.index')->with('news',$news);
    }

    public function getById($id){
        $news = News::find($id);

        if ($news){
            return view('pages.news.news')->with('news',$news);
        }

        return back()->with(['error' => 'News not found.']);
    }

    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(15);

        return view('CMS.dash.news.index', compact('news'));
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
        return view('CMS.dash.news.create');
    }

    public function store(CreateNewsRequest $request)
    {
        $news = new News();

        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $imageName);

        if ($request->pdf){
            $pdfName = $request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/images', $pdfName);
        }

        $news->author = $request->author ?? 'eacs';
        $news->title = $request->title;
        $news->text = $request->text ?? '/';
        $news->description = $request->description;
        $news->pdf = $pdfName ?? null;
        $news->photo = $imageName;
        $news->status = $request->analysisStatus;
        $news->tags = $request->tags;
        $news->save();



        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function edit($id){
        $news = News::find($id);

        if ($news){
            return view('CMS.dash.news.edit', compact('news'));
        }

        return back()->with(['error','News not found']);

    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if (!$news){
            return back()->with(['error','News not found']);
        }

        if ($request->image){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $imageName);
            File::delete(storage_path('app/public/images/' . $news->photo));

            $news->photo = $imageName;

        }

        if ($request->pdf){
            $pdfName =$request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/pdf', $pdfName);

            File::delete(storage_path('app/public/images/' . $news->pdf));

            $news->pdf = $pdfName;
        }

        $news->author = $request->author;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->text = $request->text;
        $news->status = $request->status;
        $news->tags = $request->tags;
        $news->save();


        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);

        if (File::exists(storage_path('app/public/images/' . $news->photo))) {
            File::delete(storage_path('app/public/images/' . $news->photo));
        }

        $news->delete();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

}
