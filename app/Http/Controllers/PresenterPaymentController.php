<?php

namespace App\Http\Controllers;

use App\Models\PresenterPayment;
use App\Models\User;
use Illuminate\Http\Request;

class PresenterPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = session('user.id_user');
        $data = PresenterPayment::where('id_user', $idUser)->get();
        return view('presenter.dashboard');
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
        return view('presenter.payment', compact('option', 'negara', 'page'));
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
        if ($option == 1) {
            $jenis = 'Early Bird';
        } else {
            $jenis = 'Regular';
        }
        $id_user = $request->session()->get('user.id_user');
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $presenterPayment = new PresenterPayment();
        $presenterPayment->id_user = $id_user;
        $presenterPayment->file_pembayaran = $filename;
        $presenterPayment->status = 0;
        $presenterPayment->jenis = $jenis;
        $presenterPayment->save();
        $file->storeAs('presenter-payment', $filename, 'public');
        return redirect()->route('presenter.dashboard')->with('success', 'Pembayaran berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParticipantPayment  $participantPayment
     * @return \Illuminate\Http\Response
     */
    public function reupload()
    {
        return view('presenter.reupload');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParticipantPayment  $participantPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(ParticipantPayment $participantPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParticipantPayment  $participantPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'file' => 'required|file',
        ]);
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $presenterPayment = PresenterPayment::find($id);
        $presenterPayment->file_pembayaran = $filename;
        $presenterPayment->status = 0;
        $presenterPayment->update();
        $file->storeAs('presenter-payment', $filename, 'public');
        return redirect()->route('presenter.index')->with('success', 'Pembayaran berhasil dikirim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParticipantPayment  $participantPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParticipantPayment $participantPayment)
    {
        //
    }

    public function download($id)
    {
        $presenterPayment = PresenterPayment::find($id);
        $file = public_path() . "/storage/presenter-payment/" . $presenterPayment->file_pembayaran;
        return response()->download($file);
    }
}