<?php

namespace App\Http\Controllers;

use App\Models\Pipa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PipaController extends Controller
{
    public function index()
    {
        $pipa = Pipa::all();
        $data = [
            'pipa' => $pipa
        ];
        return view('admin.pipa', $data);
    }

    public function store(Request $request)
    {

        $messages = [
            'required' => ':attribute wajib di isi!',
        ];
        $this->validate($request, [
            'name' => 'required',
        ], $messages);

        $pipa = Pipa::create($request->all());
        if ($pipa) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add new date success!');
        }
        return redirect('/pipa');
    }

    public function update(Request $request, $id)
    {
        $pipa = Pipa::findOrFail($id);
        $pipa->update($request->all());
        if ($pipa) {
            Session::flash('status', 'success');
            Session::flash('message', 'Edit date success!');
        }
        return redirect('/pipa');
    }

    public function delete($id)
    {
        $pipa = Pipa::findOrFail($id);
        $pipa->delete();
        if ($pipa) {
            Session::flash('status', 'success');
            Session::flash('message', 'Date success delete!');
        }
        return redirect('/pipa');
    }
}
