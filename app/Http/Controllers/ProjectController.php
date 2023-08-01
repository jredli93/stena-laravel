<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function getAll(){
        $projects = Project::orderBy('id','desc')->paginate(20);

        return view('pages.projects',compact('projects'));
    }

    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);

        return view('CMS.dash.project.index', compact('projects'));
    }

    public function create()
    {
        return view('CMS.dash.project.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'pdfFIle' => 'required|mimes:pdf'
        ]);


        $project = new Project();

        $project->title = $request->title;

        if ($request->pdfFIle){
            $pdfFileName = time() . '.' . $request->pdfFIle->extension();
            $request->pdfFIle->storeAs('public/projects/pdf', $pdfFileName);
            $project->pdf = $pdfFileName;
        }

        $project->save();

        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('CMS.dash.project.edit', compact('project'));

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);


        $project = Project::find($request->projectId);

        $project->title = $request->title;

        $project->save();


        return redirect()->back()->with('success', 'Successfully updated!');

    }

    public function createPdf($id)
    {
        $project = Project::find($id);
        return view('CMS.dash.project.project-pdf-create', compact('project'));
    }

    public function changePdf(Request $request)
    {
        $this->validate($request, [
            'pdfFIle' => 'required'
        ]);

        $pdfFileName = time() . '.' . $request->pdfFIle->extension();
        $request->pdfFIle->storeAs('public/projects/pdf', $pdfFileName);

        $project = Project::find($request->projectId);
        if ($project->pdf){
            if (File::exists(storage_path('app/public/projects/pdf/' . $project->pdf))) {
                File::delete(storage_path('app/public/projects/pdf/' . $project->pdf));
            }
        }
        $project->pdf = $pdfFileName;
        $project->save();

        return redirect()->back()->with('success', 'Successfully added new pdf!');
    }

    public function downloadPdf($id)
    {
        $project = Project::find($id);
        $location = storage_path('app/public/projects/pdf/' . $project->pdf);
        $filename = $project->pdf;
        $headers = [];

        return response()->download($location, $filename, $headers);
    }

    public function destroy(Request $request)
    {
        $project = Project::find($request->projectId);

        if ($project){

            if (File::exists(storage_path('app/public/projects/pdf/' . $project->pdf))) {
                File::delete(storage_path('app/public/projects/pdf/' . $project->pdf));
            }
            $project->delete();
            return redirect()->back()->with('success', 'Successfully deleted!');
        }

        return redirect()->back();
    }
}
