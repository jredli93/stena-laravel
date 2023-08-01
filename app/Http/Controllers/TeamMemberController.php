<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('created_at', 'desc')->paginate(10);

        return view('CMS.dash.teamMembers.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('CMS.dash.teamMembers.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|email|unique:team_members',
            'facebook' => 'string',
            'twitter' => 'string',
            'instagram' => 'string',
            'image' => 'required',
            'title' => 'required|string|max:255',
            'bio' => 'required|string'
        ]);

        $teamMember = new TeamMember();

        $teamMember->fullName = $request->fullName;
        $teamMember->facebook = $request->facebook;
        $teamMember->instagram = $request->instagram;
        $teamMember->twitter = $request->twitter;
        $teamMember->email = $request->email;
        $teamMember->title = $request->title;
        $teamMember->bio = $request->bio;

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);
        $teamMember->photo = $imageName;

        $teamMember->save();

        return redirect()->back()->with('success', 'Successfully created!');

    }

    public function edit($id)
    {
        $teamMember = TeamMember::find($id);

        return view('CMS.dash.teamMembers.edit', compact('teamMember'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'teamMemberId' => 'int|required',
            'fullName' => 'required|string|max:255',
            'facebook' => 'string',
            'twitter' => 'string',
            'instagram' => 'string',
            'email' => 'unique:team_members,email,'.$request->teamMemberId,
            'title' => 'required|string|max:255',
            'bio' => 'required|string'
        ]);

        $teamMember = TeamMember::find($request->teamMemberId);

        $teamMember->fullName = $request->fullName;
        $teamMember->facebook = $request->facebook;
        $teamMember->twitter = $request->twitter;
        $teamMember->instagram = $request->instagram;
        $teamMember->email = $request->email;
        $teamMember->title = $request->title;
        $teamMember->bio = $request->bio;


        $teamMember->save();

        return back()->with(['success'=> 'Team member successfully updated.']);

    }

    public function showAllPhotos($id)
    {
        $teamMember = TeamMember::find($id);
        return view('CMS.dash.teamMembers.gallery', compact('teamMember'));
    }

    public function createPicture($id)
    {
        $teamMember = TeamMember::find($id);
        return view('CMS.dash.teamMembers.create-image', compact('teamMember'));

    }

    public function storePicture(Request $request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $teamMember = TeamMember::find($request->teamMemberId);
        if ($teamMember->photo){
            if (File::exists(storage_path('app/public/images/' . $teamMember->photo))) {
                File::delete(storage_path('app/public/images/' . $teamMember->photo));
            }
        }
        $teamMember->photo = $imageName;
        $teamMember->save();

        return redirect()->back()->with('success', 'Successfully added new image!');
    }


    public function destroy(Request $request)
    {
        $teamMember = TeamMember::find($request->teamMemberId);

        if ($teamMember){
            if (File::exists(storage_path('app/public/images/' . $teamMember->photo))) {
                File::delete(storage_path('app/public/images/' . $teamMember->photo));
            }


            $teamMember->delete();

            return redirect()->back()->with('success', 'Successfully deleted!');
        }
        return redirect()->back();
    }

    public function deletePicture($id)
    {
        $teamMember = TeamMember::find($id);

        if ($teamMember){

            if (File::exists(storage_path('app/public/images/' . $teamMember->photo))) {
                File::delete(storage_path('app/public/images/' . $teamMember->photo));
            }

            $teamMember->photo = null;
            $teamMember->save();
        }
        return redirect()->back()->with('success', 'Successfully deleted image!');
    }
}
