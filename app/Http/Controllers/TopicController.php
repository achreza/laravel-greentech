<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        $items = Topic::all();
        $page = 'content';

        return view('admin.topics', compact('items', 'page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
        ]);


        Topic::create([
            'nama_topic' => $request->input('topic'),
        ]);

        return redirect('/admin/topic')->with('success', 'Topic added successfully!');
    }

    public function destroy($id)
    {
        Topic::destroy($id);

        return redirect('/admin/topic')->with('success', 'Topic removed: ' . $id);
    }
}