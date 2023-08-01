<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Submission;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_user = $request->session()->get('user.id_user');
        //where id_user = $id_user and status = 1
        $data = Submission::where('id_user', $id_user)->where('status_bayar', 1)->get();
        $page = 'content';
        return view('participant.paper', compact('data', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'authors' => 'required',
            'authors-email' => 'required',
            'file' => 'required|file',
        ]);
        $submitter = $request->session()->get('user.id_user');

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        $Paper = new Paper();
        $Paper->judul = $request->input('judul');
        $Paper->author = $request->input('authors');
        $Paper->author_email = $request->input('authors-email');
        $Paper->file_paper = $filename;
        $Paper->submitter = $submitter;
        $Paper->id_abstrak = $id;

        $Paper->save();

        $file->storeAs('paper', $filename, 'public');


        return redirect('/dashboard')->with('success', 'Paper added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = 'content';
        $id_abs = Submission::where('id_user', session('user.id_user'))->where('status_bayar', 1)->where('id_abs_submission', $id)->first();



        return view('participant.paper-add', compact('page', 'id_abs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        //
    }
}