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
            'tips' => 'required|',
            ]);
        $info = new Infopraktis;
        $info->tips = $request->tips;
        $info->save();
        return redirect()->route('info.index');
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
    public function edit($id)
    {
        $info = Infopraktis::findOrFail($id);
        return view('info.edit',compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Infopraktis  $infopraktis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'tips' => 'required|',
        ]);
        $info = Infopraktis::findOrFail($id);
        $info->tips = $request->tips;
        $info->save();
        return redirect()->route('info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Infopraktis  $infopraktis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Infopraktis::findOrFail($id);
        $info->delete(); 
        return redirect()->route('info.index');
    }
}
