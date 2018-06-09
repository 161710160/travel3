<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel =  Artikel::all();
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create');
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
            'deskripsi' => 'required|',
            ]);
        $artikel = new Artikel;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrfail($id);
        return view('artikel.edit',compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'deskripsi' => 'required|',
        ]);
        $artikel = Artikel::findOrFail($id);
        $artikel->deskripsi = $request->deskripsi;
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete(); 
        return redirect()->route('artikel.index');
    }
}
