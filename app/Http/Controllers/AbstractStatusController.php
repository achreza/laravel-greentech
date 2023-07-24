<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreAbstractStatusRequest;
use App\Http\Requests\UpdateAbstractStatusRequest;
use App\Models\StatusAbstract;

class AbstractStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = StatusAbstract::all();
        $page = 'content';
        return view('admin.abstract', compact('items', 'page'));
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


    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);


        StatusAbstract::create([
            'status' => $request->input('status'),
        ]);
        return redirect('/admin/abstract-status')->with('inserted', 'Success Insert Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbstractStatus  $abstractStatus
     * @return \Illuminate\Http\Response
     */
    public function show(AbstractStatus $abstractStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AbstractStatus  $abstractStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(AbstractStatus $abstractStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbstractStatusRequest  $request
     * @param  \App\Models\AbstractStatus  $abstractStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbstractStatusRequest $request, AbstractStatus $abstractStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbstractStatus  $abstractStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StatusAbstract::destroy($id);
        return redirect('/admin/abstract-status')->with('deleted', 'Data Deleted');
    }
}