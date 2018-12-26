<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Fotografi;
use App\User;

class FotografiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function foto()
    {
        //
        return view('crud.foto');
    }

    public function liat()
    {
        //
        $fotos = Fotografi::orderBy('id','DESC')->paginate(4);
        return view('crud.read.showfoto',compact('fotos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // tambah untuk fotografer
    public function storefoto(Request $request)
    {
        //
        
        $tambah = new Fotografi();
        $tambah->nama = $request->get('nama');
        $tambah->user_id =  auth()->id();
        $tambah->slug_foto = Str::slug($request->get('nama'));
        $tambah->harga = $request->get('harga');

        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('gambar');
        $fileName   = $file->getClientOriginalName();
        $request->file('gambar')->move("images/", $fileName);

        $tambah->gambar = $fileName;
        $tambah->save();

        return redirect()->to('/tampilan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $tampilkan = Fotografi::where('slug_foto',$slug)->first();
        return view('crud.read.rmfoto',compact('tampilkan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editfoto($id)
    {
        //
        $tampiledit = Fotografi::where('id', $id)->first();
        return view('crud.update.updatefoto')->with('tampiledit', $tampiledit);
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
        $update = Fotografi::where('id', $id)->first();
        $update->harga = $request['harga'];
        
        if($request->file('gambar') == "")
        {
            $update->gambar = $update->gambar;
        } 
        else
        {
            $file       = $request->file('gambar');
            $fileName   = $file->getClientOriginalName();
            $request->file('gambar')->move("images/", $fileName);
            $update->gambar = $fileName;
        }
        
        $update->update();

        return redirect()->to('/showfoto');
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
        $hapus = Fotografi::find($id);
        $hapus->delete();

        return redirect()->to('/showfoto');
    }
}
