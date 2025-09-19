<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; //for storage::file()
use Illuminate\Support\Str; //for Str::random()
use App\Models\FileUpload;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use App\Models\Dashboard;


class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profil Berhasil Di Update!');
    }

    public function changepassword()
    {
        return view('profile.changepassword', ['user' => Auth::user()]);
    }

    public function password(Request $request)
    {

        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (! Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Incorrect Password!']);
        }

        $user->fill([
            'password' => Hash::make($request->new_password),
        ])->save();

        return back()->with('status', 'Password Successfully Changed!');

    }

    public function show_files() {
        $my_files = FileUpload::select('id', 'title', 'filename', 'md5', 'properties_metadata')->where('user_id', '=', Auth::id())->get();
        return view('profile.upload', ['files' => $my_files]);
    }
   
    public function add_dashboard(Request $request)
    {

        //upload()
        $request->validate([
            'name' => [
                'required',
            ],
        ]);
        $userId = auth()->id();
        $dashboard = new Dashboard;
        $dashboard->user_id = $userId;
        $dashboard->name = $request->name;
        $dashboard->save();
        
        return redirect()->route('profile.dashboard', ['id' => $dashboard->id]); # Get the new dashboard id we made and go there.
    }

    public function get_file_metadata(Request $request) {
        $filename = $request->filename;
	    $get_file = FileUpload::where('filename', '=', $filename)
		    ->where('user_id', '=', Auth::id())
		    ->get();
	    $metadata = json_decode($get_file->value('properties_metadata'), true);
	    $return_val = ['data' =>  $metadata];
	    return response()->json($metadata);
    }
    
}
