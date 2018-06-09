<?php

namespace App\Http\Controllers;

use App\Galleri;
use File;
use Illuminate\Http\Request;

class GalleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleri = Galleri::all();
        return view('galleri.index',compact('galleri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galleri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galleri = new Galleri;
        $galleri->photos = $request->photos;

        //upload foto
        if($request->hasFile('photos')) {
            $file = $request->file('photos');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $galleri->photos = $filename;
        }
        $galleri->save();
        return redirect()->route('galleri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function show(Galleri $galleri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleri = Galleri::findOrFail($id);
        return view('galleri.edit', compact('galleri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'photos' => 'required|',
        ]);
        $galleri = Galleri::findOrFail($id);
    
        if ($request->hasFile('photos')){ 
            $file = $request->file('photos');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            //hapus foto lama
            if($galleri->photos){
                $old_photo = $galleri->photos;
                $filepath = public_path() .DIRECTORY_SEPARATOR. '/img' .DIRECTORY_SEPARATOR. $galleri->photos;
                    try{
                        File::delete($filepath);
                    }catch(FileNotFoundException $e){

                    }
            }
            $galleri->photos = $filename;
        }
            $galleri->save();
            return redirect()->route('galleri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galleri = Galleri::findOrFail($id);
        if($galleri->photos){
            $old_foto = $galleri->photos;
            $filepath = public_path() .DIRECTORY_SEPARATOR. 'img'.DIRECTORY_SEPARATOR. $galleri->photos;

            try{
                File::delete($filepath);
            }catch (FileNotFoundException $e){

            }
            $galleri->delete();
            return redirect()->route('galleri.index');
        }
    }
}
