<?php

namespace App\Http\Controllers;

use App\Events\SendWelcomeMail;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('CMS.dash.user.index', compact('users'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('CMS.dash.user.edit-profile', compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail(Auth::id());

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('CMS.dash.user.editUser', compact('user', ));

    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->userId);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        $user->save();

        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function addUser()
    {
        return view('CMS.dash.user.create-user');
    }

    public function storeUser(CreateUserRequest $request)
    {
            $user = new User();

            $randomGeneratedPassword = Str::random(8);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($randomGeneratedPassword);


            $user->save();

            event(new SendWelcomeMail($user, $randomGeneratedPassword));

            return redirect()->back()->with('success', 'Successfully created!');

    }


    public function destroy(Request $request)
    {
        $user = User::find($request->userId);

        if ($user){
            $user->delete();
            return redirect()->back()->with('success', 'Successfully deleted!');
        }
    }
}
