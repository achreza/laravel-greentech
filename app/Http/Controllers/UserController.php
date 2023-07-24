<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $totalAdmin = User::where('id_role_user', 1)->count();
        $totalReviewer = User::where('id_role_user', 2)->count();
        $totalPresenter = User::where('id_role_user', 3)->count();
        $totalParticipant = User::where('id_role_user', 4)->count();
        $page = 'content';

        return view('admin.user', compact('users', 'totalAdmin', 'totalReviewer', 'totalPresenter', 'totalParticipant', 'page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'institution' => 'required',
            'country' => 'required',
            'gender' => 'required',
            'category' => 'required',
        ]);

        User::create([
            'email' => $request->input('email'),
            'nama' => $request->input('name'),
            'no_telp' => $request->input('phone'),
            'institusi' => $request->input('institution'),
            'negara' => $request->input('country'),
            'jenis_kelamin' => $request->input('gender'),
            'id_role_user' => $request->input('category'),
        ]);

        return redirect('/admin/user-list')->with('success', 'User added successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/user-list')->with('success', 'User removed: ' . $id);
    }
}