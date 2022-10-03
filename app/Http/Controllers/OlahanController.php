<?php

namespace App\Http\Controllers;

use App\Models\Pipa;
use App\Models\Olahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OlahanController extends Controller
{
    public function index()
    {
        $pipa = Pipa::get();
        $olahan = Olahan::with('pipa')->get();
        $data = [
            'pipa' => $pipa,
            'olahan' => $olahan
        ];
        return view('admin.olahan', $data);
    }

    public function store(Request $request)
    {
        $request['petugas'] = Auth::user()->name;
        $olahan = Olahan::create($request->all());
        if ($olahan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add new date success!');
        }
        return redirect('/olahan');
    }

    public function update(Request $request, $id)
    {
        $olahan = Olahan::findOrFail($id);
        $request['petugas'] = Auth::user()->name;
        $olahan->update($request->all());
        if ($olahan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit date success!');
        }
        return redirect('/olahan');
    }

    public function delete($id)
    {
        $olahan = Olahan::findOrFail($id);
        $olahan->delete();
        if ($olahan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Date success delete!');
        }
        return redirect('/olahan');
    }
}
