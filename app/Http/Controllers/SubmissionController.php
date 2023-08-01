<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\SystemStatus;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $topics = Topic::all();

        //$submissionStatus = $request->session()->get('system.status_submission');
        $page = 'content';

        return view('participant.submission', compact('topics', 'page'));
    }

    public function detail(Request $request, $id)
    {
        $user = $request->session()->get('user');

        $topics = Topic::all();

        $data = Submission::where('id_user', $user->id_user)
            ->where('id_abs_submission', $id)
            ->first();
        $page = 'content';

        return view('user.detail', compact('data', 'topics', 'user', 'page'));
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
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'file' => 'required|file',
        ]);

        $tanggal = now()->format('d/m/Y');
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        $submission = new Submission();
        $submission->id_topic = $request->input('topic');
        $submission->judul = $request->input('judul');
        $submission->abstrak = $request->input('abstrak');
        $submission->file_abs = $filename;
        $submission->submitted_at = $tanggal;
        $submission->id_status_abs = 1;
        $submission->id_user = $request->session()->get('user.id_user');
        $submission->save();

        $file->storeAs('uploads', $filename, 'public');

        return redirect('/dashboard')->with('success', 'Submission added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'id_topic' => $request->input('topic'),
            'judul' => $request->input('judul'),
            'abstrak' => $request->input('abstrak'),
        ];


        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|file',
            ]);

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $data['file_abs'] = $filename;

            $file->storeAs('uploads', $filename);
        }

        Submission::where('id_abs_submission', $id)
            ->update($data);

        if ($request->hasFile('file')) {
            $request->session()->flash('success', 'Data updated successfully!');
            return redirect('/dashboard');
        } else {
            return redirect('/detail/' . $id)->with('success', 'Data updated successfully!');
        }
    }

    public function download($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/uploads/{$nama_file}");

        // Cek apakah file ada di direktori storage
        if (!file_exists($filePath)) {
            return redirect('/dashboard')->with('error', 'File not found.');
        }

        // Ambil nama file tanpa path
        $originalName = pathinfo($filePath, PATHINFO_FILENAME);

        // Dapatkan ekstensi file
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Mendefinisikan headers untuk response
        $headers = [
            'Content-Type' => mime_content_type($filePath),
            'Content-Disposition' => "attachment; filename=\"{$originalName}.{$extension}\"",
        ];

        // Return response dengan file untuk di-download
        return response()->file($filePath, $headers);
    }
    public function paymentDownload($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/payment/{$nama_file}");

        // Cek apakah file ada di direktori storage
        if (!file_exists($filePath)) {
            return redirect('/dashboard')->with('error', 'File not found.');
        }

        // Ambil nama file tanpa path
        $originalName = pathinfo($filePath, PATHINFO_FILENAME);

        // Dapatkan ekstensi file
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        // Mendefinisikan headers untuk response
        $headers = [
            'Content-Type' => mime_content_type($filePath),
            'Content-Disposition' => "attachment; filename=\"{$originalName}.{$extension}\"",
        ];

        // Return response dengan file untuk di-download
        return response()->file($filePath, $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::table('submission_abstrak')
            ->where('id_abs_submission', $id)
            ->delete();

        $request->session()->flash('success', 'Data removed: ' . $id);
        return redirect('/dashboard');
    }
    public function decision(Request $request, $id)
    {
        $submission = Submission::find($id);
        $formattedDate = now()->format('d/m/Y');

        $submission->comment = $request->comment;
        $submission->id_status_abs = $request->status;
        $submission->decission_by = session('user.id_user');
        $submission->decission_at = $formattedDate;
        $submission->update();

        return redirect('/dashboard')->with('success', 'Decision added successfully.');
    }


    public function systemStatus(Request $request)
    {
        $request->validate([
            'system-status' => 'required',
            'payment' => 'required',
        ]);

        $system = SystemStatus::first();
        $status = $request->input('system-status');
        $payment = $request->input('payment');

        $system->status = $status;
        $system->payment = $payment;
        $system->update();

        return redirect('/dashboard')->with('success', 'System status updated successfully.');
    }

    public function payment(Request $request)
    {
        $id = $request->session()->get('user.id_user');
        $page = 'content';
        $submission = Submission::where('id_user', $id)->get();
        return view('user.payment', compact('page', 'submission'));
    }
    public function paymentAction(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);
        $id = $request->input('submission');

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        $submission = Submission::find($id);
        $submission->file_pembayaran = $filename;
        $submission->update();

        $file->storeAs('payment', $filename, 'public');

        return redirect('/dashboard')->with('success', 'Payment added successfully.');
    }
}