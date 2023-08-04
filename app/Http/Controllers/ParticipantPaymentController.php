<?php

namespace App\Http\Controllers;

use App\Models\ParticipantPayment;
use App\Models\User;
use Illuminate\Http\Request;

class ParticipantPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = session('user.id_user');
        $data = ParticipantPayment::where('id_participant', $idUser)->get();
        $page = 'content';
        return view('participant.dashboard', compact('data', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $option = $request->payment;
        //get column negara from table m_user where id_user = $id_user
        $id_user = $request->session()->get('user.id_user');
        $negara = User::where('id_user', $id_user)->value('negara');
        $page = 'content';
        return view('participant.payment', compact('option', 'negara', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $option)
    {

        $request->validate([

            'file' => 'required|file',
        ]);
        if ($option == 'early') {
            $jenis = 'Early Bird';
        } else {
            $jenis = 'Regular';
        }
        $id_user = $request->session()->get('user.id_user');
        $file = $request->file('file');

        $participantPayment = new ParticipantPayment();
        $participantPayment->id_participant = $id_user;
        $participantPayment->file_pembayaran = "-";
        $participantPayment->status = 0;
        $participantPayment->jenis = $jenis;
        $participantPayment->save();
        $p2 = ParticipantPayment::where('id_participant_payment', $participantPayment->id_participant_payment)->first();
        $filename = $this->generateFileName($file, $participantPayment->id_participant_payment);
        $p2->file_pembayaran = $filename;
        $p2->update();



        $file->storeAs('participant-payment', $filename, 'public');
        return redirect('/dashboard-participant')->with('success', 'Pembayaran berhasil dikirim');
    }


    public function reupload($id)
    {
        $id = $id;
        $page = 'content';
        return view('participant.reupload', compact('page', 'id'));
    }

    public function edit(ParticipantPayment $participantPayment)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $filename = $this->generateFileName($file, $id);
        $participantPayment = ParticipantPayment::find($id);
        $participantPayment->file_pembayaran = $filename;
        $participantPayment->status = 0;
        $participantPayment->update();
        $file->storeAs('participant-payment', $filename, 'public');
        return redirect('/dashboard-participant')->with('success', 'Pembayaran berhasil dikirim');
    }


    public function destroy(ParticipantPayment $participantPayment)
    {
        //
    }

    public function download($nama_file)
    {
        // Dapatkan path lengkap dari file yang akan didownload di dalam direktori storage
        $filePath = storage_path("app/public/participant-payment/{$nama_file}");

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

    private function generateFileName($file, $id)
    {
        $originalname = $file->getClientOriginalName();
        $fileExtension = preg_match('/\.+[\S]+$/', $originalname) ? preg_replace('/^.+(\..+)$/', '$1', $originalname) : '';
        $fieldName = "cp";
        $timestamp = date('dmY'); // Format: DayMonthYear
        return "{$fieldName}_{$id}_{$timestamp}" . $fileExtension;
    }
}