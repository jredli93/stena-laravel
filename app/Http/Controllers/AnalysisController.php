<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Analysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnalysisController extends Controller
{
    public function getAll(){
        $analysis = Analysis::orderBy('created_at')->paginate(15);

        return view('pages.analysis.index',compact('analysis'));
    }

    public function getById($id){
        $analysis = Analysis::find($id);

        if ($analysis){
            return view('pages.analysis.analysis')->with('analysis',$analysis);
        }
        return back();
    }

    public function index()
    {
        $analysis = Analysis::orderBy('created_at', 'desc')->paginate(10);

        return view('CMS.dash.analysis.index', compact('analysis'));
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
        return view('CMS.dash.analysis.create');
    }

    public function store(CreateNewsRequest $request)
    {
        $analysis = new Analysis();

        $imageName = $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $imageName);

        if ($request->pdf){
            $pdfName = $request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/images', $pdfName);
        }

        $analysis->author = $request->author ?? 'eacs';
        $analysis->title = $request->title;
        $analysis->text = $request->text ?? '/';
        $analysis->description = $request->description;
        $analysis->pdf = $pdfName ?? null;
        $analysis->photo = $imageName;
        $analysis->status = $request->analysisStatus;
        $analysis->tags = $request->tags;
        $analysis->save();



        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function edit($id){
        $analysis = Analysis::find($id);

        if ($analysis){
            return view('CMS.dash.analysis.edit', compact('analysis'));
        }

        return back()->with(['error','Analysis not found']);
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        $analysis = Analysis::find($id);

        if (!$analysis){
            return back()->with(['error','Analysis not found']);
        }

        if ($request->image){
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images', $imageName);
            File::delete(storage_path('app/public/images/' . $analysis->photo));

            $analysis->photo = $imageName;

        }

        if ($request->pdf){
            $pdfName =$request->pdf->getClientOriginalName();
            $request->pdf->storeAs('public/pdf', $pdfName);

            File::delete(storage_path('app/public/images/' . $analysis->pdf));

            $analysis->pdf = $pdfName;
        }

        $analysis->author = $request->author;
        $analysis->title = $request->title;
        $analysis->description = $request->description;
        $analysis->text = $request->text;
        $analysis->status = $request->status;
        $analysis->tags = $request->tags;
        $analysis->save();


        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function delete($id)
    {
        $analysis = Analysis::findOrFail($id);

        if (File::exists(storage_path('app/public/images/' . $analysis->photo))) {
            File::delete(storage_path('app/public/images/' . $analysis->photo));
        }

        $analysis->delete();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

}
