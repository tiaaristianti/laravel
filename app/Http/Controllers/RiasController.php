<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Rias;
use App\User;

class RiasController extends Controller
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

    public function rias()
    {
        //
        return view('crud.rias');
    }

    public function liat()
    {
        //
        $riass = Rias::orderBy('id','DESC')->paginate(4);
        return view('crud.read.showrias',compact('riass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storerias(Request $request)
    {
        //
        $tambah = new Rias();
        $tambah->nama = $request->get('nama');
        $tambah->user_id =  auth()->id();
        $tambah->slug_rias = Str::slug($request->get('nama'));
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
        $tampilkan = Rias::where('slug_rias',$slug)->first();
        return view('crud.read.rmrias',compact('tampilkan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editrias($id)
    {
        //
        $tampiledit = Rias::where('id', $id)->first();
        return view('crud.update.updaterias')->with('tampiledit', $tampiledit);
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
        $update = Rias::where('id', $id)->first();
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

        return redirect()->to('/showrias');
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
        $hapus = Rias::find($id);
        $hapus->delete();

        return redirect()->to('/showrias');
    }
}
