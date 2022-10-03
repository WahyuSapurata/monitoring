<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function index()
    {
        $user = User::where('role', 2)->get();
        $data = [
            'user' => $user
        ];
        return view('admin.member', $data);
    }

    public function delete($id)
    {
        $member = User::findOrFail($id);
        $member->delete();
        if ($member) {
            Session::flash('status', 'success');
            Session::flash('message', 'Date success delete!');
        }
        return redirect('/member');
    }
}
