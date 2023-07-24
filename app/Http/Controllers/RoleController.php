<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $items = RoleUser::all();
        $page = 'content';

        return view('admin.role', compact('items', 'page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);

        RoleUser::create([
            'nama_role' => $request->input('role'),
        ]);

        return redirect('/admin/user-role')->with('success', 'Role added successfully!');
    }

    public function destroy($id)
    {
        RoleUser::destroy($id);

        return redirect('/admin/user-role')->with('success', 'Role removed: ' . $id);
    }
}