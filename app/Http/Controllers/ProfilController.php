<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil');
    }

    public function update(Request $request, $id)
    {
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('photo', $newName);
        } else {
            $newName = Auth::user()->image;
        }
        $profil = User::findOrFail($id);
        $request['image'] = $newName;
        $profil->update($request->all());
        if ($profil) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit date success!');
        }
        return redirect('/profil');
    }
}
