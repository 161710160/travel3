<?php

namespace App\Http\Controllers;

use App\Infopraktis;
use Illuminate\Http\Request;

class InfopraktisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info =  Infopraktis::all();
        return view('info.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_wisata' => 'required|',
            ]);
        $kategori = new Kategori;
        $kategori->nama_wisata = $request->nama_wisata;
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Infopraktis  $infopraktis
     * @return \Illuminate\Http\Response
     */
    public function show(Infopraktis $infopraktis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Infopraktis  $infopraktis
     * @return \Illuminate\Http\Response
     */
    public function edit(Infopraktis $infopraktis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Infopraktis  $infopraktis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infopraktis $infopraktis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Infopraktis  $infopraktis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infopraktis $infopraktis)
    {
        //
    }
}
