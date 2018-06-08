<?php

namespace App\Http\Controllers;

use App\Travel;
use App\Kategori;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travel =  Travel::with('kategori')->get();
        return view('travel.index', compact('travel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('travel.create', compact('kategori'));
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
            'tempat_wisata' => 'required|',
            'artikel' => 'required|',
            'kategori_id' => 'required',
            
            ]);
        $travel = new Travel;
        $travel->tempat_wisata = $request->tempat_wisata;
        $travel->artikel = $request->artikel;
        $travel->kategori_id = $request->kategori_id;
        $travel->save();
        return redirect()->route('travel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function show(Travel $travel)
    {
        $kategori = Kategori::findOrFail($id);
        return view('travel.show',compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travel = Travel::findOrfail($id);
        $kategori = Kategori::all();
        $selectedkategori = Travel::findOrfail($id)->kategori_id;
        return view('travel.edit',compact('travel','kategori','selectedkategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tempat_wisata' => 'required|',
            'artikel' => 'required|',
            'kategori_id' => 'required|'
        ]);
        $travel = Travel::findOrFail($id);
        $travel->tempat_wisata = $request->tempat_wisata;
        $travel->artikel = $request->artikel;
        $travel->kategori_id = $request->kategori_id;                                                                                                 
        $travel->save();
        return redirect()->route('travel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $travel = Travel::findOrFail($id);
        $travel->delete(); 
        return redirect()->route('travel.index');
    }
}
