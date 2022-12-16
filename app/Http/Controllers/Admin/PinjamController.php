<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pinjam;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjams = Pinjam::all();
        return view('admin.pinjam', compact('pinjams'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->delete();
        return redirect()->route('admin.pinjam.index');
    }

    public function terima($id) {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->update([
            'status' => 'diterima',
        ]);
        return redirect()->route('admin.pinjam.index');
    }

    public function tolak($id) {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->update([
            'status' => 'ditolak',
        ]);
        return redirect()->route('admin.pinjam.index');
    }
    
    public function selesai($id) {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->update([
            'status' => 'selesai',
        ]);
        return redirect()->route('admin.pinjam.index');
    }
}
