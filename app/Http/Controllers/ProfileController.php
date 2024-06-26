<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userEmail = $request->session()->get('user.email');

        $data = User::where('email', $userEmail)->first();
        $page = 'content';

        return view('presenter.profile', compact('data', 'page'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'userName' => 'required',
            'userPhone' => 'nullable',
            'userIstitution' => 'nullable',
            'userCountry' => 'nullable',
            'gender' => 'nullable',
        ]);
        $id = $request->session()->get('user.id_user');
        $user = User::find($id);
        $user->nama = $data['userName'];
        $user->no_telp = $data['userPhone'];
        $user->institusi = $data['userIstitution'];
        $user->negara = $data['userCountry'];
        $user->jenis_kelamin = $data['gender'];
        $user->update();

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
