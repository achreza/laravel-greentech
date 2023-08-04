<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\PeerReview;
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
        return view('presenter.paper', compact('data', 'page'));
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
        $Paper->publikasi = $request->input('publikasi');
        $Paper->file_paper = $filename;
        $Paper->submitter = $submitter;
        $Paper->id_abstrak = $id;


        $Paper->save();

        $peer = new PeerReview();
        $peer->id_paper = $Paper->id_paper;
        $peer->file_origin = $filename;

        $peer->save();

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

        return view('presenter.paper-add', compact('page', 'id_abs'));
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
    public function peerReview(Request $request)
    {
        if ($request->session()->get('user.id_role_user') == 2) {
            $page = 'content';
            $submitter = $request->session()->get('user.id_user');
            $data = Paper::where('submitter', $submitter)->where('publikasi', 1)->orWhere('publikasi', 2)->where('status_bayar', 1)->get();
            return view('presenter.peer-review', compact('page', 'data'));
        } else {
            $page = 'content';
            $data = Paper::where('publikasi', 1)->orWhere('publikasi', 2)->where('status_bayar', 1)->get();
            return view('reviewer.peer-review', compact('page', 'data'));
        }
    }

    public function peerReviewDetail(Request $request, $id)
    {

        $page = 'content';
        $data = PeerReview::where('id_paper', $id)->get();

        if ($request->session()->get('user.id_role_user') == 2) {
            return view('presenter.peer-review-detail', compact('page', 'data'));
        } else if ($request->session()->get('user.id_role_user') == 4) {
            return view('reviewer.peer-review-detail', compact('page', 'data'));
        }
    }
    public function peerReviewEdit(Request $request, $id)
    {

        $page = 'content';

        $data = PeerReview::find($id);

        if ($request->session()->get('user.id_role_user') == 2) {
            return view('presenter.peer-review-add', compact('page', 'data'));
        } else if ($request->session()->get('user.id_role_user') == 4) {
            //dd($data);
            return view('reviewer.peer-review-add', compact('page', 'data'));
        }
    }
    public function peerReviewAction(Request $request, $id)
    {
        $page = 'content';
        $data = PeerReview::find($id);

        if ($request->session()->get('user.id_role_user') == 2) {
            $peer = new PeerReview();
            $file = $request->file('file');
            $filename = $this->generateFileName($file, $id);
            $peer->id_paper = $data->id_paper;
            $peer->file_origin = $filename;
            $peer->save();
            $file->storeAs('paper-revision-presenter', $filename, 'public');
            return redirect('/dashboard')->with('success', 'Paper added successfully.');
        } else if ($request->session()->get('user.id_role_user') == 4) {
            $file = $request->file('file');
            $filename = $this->generateFileName($file, $id);
            $data->file_revision = $filename;
            $data->comment = $request->input('comment');
            $data->update();
            $file->storeAs('paper-revision-reviewer', $filename, 'public');

            return redirect('/dashboard')->with('success', 'Paper added successfully.');
        }
    }

    private function generateFileName($file, $id)
    {
        $originalname = $file->getClientOriginalName();
        $fileExtension = preg_match('/\.+[\S]+$/', $originalname) ? preg_replace('/^.+(\..+)$/', '$1', $originalname) : '';
        $fieldName = "cp";
        $timestamp = date('dmY'); // Format: DayMonthYear
        return "{$fieldName}_{$id}_{$timestamp}" . $fileExtension;
    }
    public function downloadPeerReviewer($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/paper-revision-reviewer/{$nama_file}");

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
    public function downloadPeerPresenter($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/paper-revision-presenter/{$nama_file}");

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
    public function downloadPaperPayment($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/paper-payment/{$nama_file}");

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

    public function paperPayment(Request $request)
    {
        $id_user = $request->session()->get('user.id_user');
        $page = 'content';

        if ($request->session()->get('user.id_role_user') == 2) {
            $data = Paper::where('submitter', $id_user)->where('publikasi', 1)->orWhere('publikasi', 2)->get();

            return view('presenter.paper-payment', compact('page', 'data'));
        } else if ($request->session()->get('user.id_role_user') == 1) {
            $data = Paper::where('publikasi', 1)->orWhere('publikasi', 2)->get();
            return view('admin.paper-payment', compact('page', 'data'));
        }
    }
    public function paperPaymentPage(Request $request, $id)
    {
        $page = 'content';
        $data = Paper::find($id);
        if ($request->session()->get('user.id_role_user') == 2) {
            return view('presenter.paper-payment-page', compact('page', 'data'));
        } else if ($request->session()->get('user.id_role_user') == 1) {
            return view('admin.paper-payment-page', compact('page', 'data'));
        }
    }
    public function paperPaymentAction(Request $request, $id)
    {
        $id_user = $request->session()->get('user.id_user');
        $page = 'content';
        $data = Paper::find($id);
        $file = $request->file('file');
        $filename = $this->generateFileName($file, $id);
        $data->status_bayar = 0;
        $data->file_bayar = $filename;
        $data->update();
        $file->storeAs('paper-payment', $filename, 'public');
        return redirect('/dashboard')->with('success', 'Paper added successfully.');
    }

    public function paperPaymentAdmin(Request $request, $id)
    {
        $data = Paper::find($id);
        $data->status_bayar = $request->input('status');
        $data->update();
        return redirect('/dashboard')->with('success', 'Paper added successfully.');
    }
}