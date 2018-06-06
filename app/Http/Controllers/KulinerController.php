<?php

namespace App\Http\Controllers;

use App\Kuliner;
use App\Kategori;
use Illuminate\Http\Request;

class KulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kuliner =  Kuliner::with('kategori')->get();
        return view('kuliner.index', compact('kuliner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('kuliner.create', compact('kategori'));
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
            'nama_kuliner' => 'required|',
            'deskripsi' => 'required|',
            'kategori_id' => 'required'
            ]);
        $kuliner = new Kuliner;
        $kuliner->nama_kuliner = $request->nama_kuliner;
        $kuliner->deskripsi = $request->deskripsi;
        $kuliner->kategori_id = $request->kategori_id;
        $kuliner->save();
        return redirect()->route('kuliner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kuliner  $kuliner
     * @return \Illuminate\Http\Response
     */
    public function show(Kuliner $kuliner)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kuliner.show',compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kuliner  $kuliner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kuliner = Kuliner::findOrfail($id);
        $kategori = Kategori::all();
        $selectedkategori = Kuliner::findOrfail($id)->kategori_id;
        return view('kuliner.edit',compact('kuliner','kategori','selectedkategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kuliner  $kuliner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama_kuliner' => 'required|',
            'deskripsi' => 'required|',
            'kategori_id' => 'required|'
        ]);
        $kuliner = Kuliner::findOrFail($id);
        $kuliner->nama_kuliner = $request->nama_kuliner;
        $kuliner->deskripsi = $request->deskripsi;
        $kuliner->kategori_id = $request->kategori_id;                                                                                                 
        $kuliner->save();
        return redirect()->route('kuliner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kuliner  $kuliner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        $kuliner->delete(); 
        return redirect()->route('kuliner.index');
    }
}
