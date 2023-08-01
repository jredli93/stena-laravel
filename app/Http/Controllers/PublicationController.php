<?php

namespace App\Http\Controllers;


use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PublicationController extends Controller
{
    public function getAll(){
        $publications = Publication::paginate(20);


        return view('pages.publications',compact('publications'));
    }

    public function index()
    {
        $publications = Publication::orderBy('created_at', 'desc')->paginate(10);
        return view('CMS.dash.publication.index', compact('publications'));
    }

    public function create()
    {
        return view('CMS.dash.publication.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'pdfFIle' => 'required|mimes:pdf'
        ]);


        $publication = new Publication();

        $publication->title = $request->title;

        if ($request->pdfFIle){
            $pdfFileName = time() . '.' . $request->pdfFIle->extension();
            $request->pdfFIle->storeAs('public/pdf', $pdfFileName);
            $publication->pdf = $pdfFileName;
        }

        $publication->save();

        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function edit($id)
    {
        $publication = Publication::find($id);
        return view('CMS.dash.publication.edit', compact('publication'));

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);


        $publication = Publication::find($request->publicationId);

        $publication->title = $request->title;


        if ($request->pdfFIle){
            $pdfFileName = time() . '.' . $request->pdfFIle->extension();
            $request->pdfFIle->storeAs('public/pdf', $pdfFileName);
            $publication->pdf = $pdfFileName;
        }

        $publication->save();


        return redirect()->back()->with('success', 'Successfully updated!');

    }

    public function createPdf($id)
    {
        $publication = Publication::find($id);
        return view('CMS.dash.publication.publication-pdf-create', compact('publication'));
    }

    public function changePdf(Request $request)
    {
        $this->validate($request, [
            'pdfFIle' => 'required'
        ]);

        $pdfFileName = time() . '.' . $request->pdfFIle->extension();
        $request->pdfFIle->storeAs('public/pdf', $pdfFileName);

        $publication = Publication::find($request->publicationId);
        if ($publication->pdf){
            if (File::exists(storage_path('app/public/pdf/' . $publication->pdf))) {
                File::delete(storage_path('app/public/pdf/' . $publication->pdf));
            }
        }
        $publication->pdf = $pdfFileName;
        $publication->save();

        return redirect()->back()->with('success', 'Successfully added new pdf!');
    }

    public function downloadPdf($id)
    {
        $publication = Publication::find($id);
        $location = storage_path('app/public/pdf/' . $publication->pdf);
        $filename = $publication->pdf;
        $headers = [];

        return response()->download($location, $filename, $headers);
    }

    public function destroy(Request $request)
    {
        $publication = Publication::find($request->publicationId);

        if ($publication){

            if (File::exists(storage_path('app/public/pdf/' . $publication->pdf))) {
                File::delete(storage_path('app/public/pdf/' . $publication->pdf));
            }
            $publication->delete();
            return redirect()->back()->with('success', 'Successfully deleted!');
        }

        return redirect()->back();
    }

}
