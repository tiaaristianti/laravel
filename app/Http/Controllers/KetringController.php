<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Ketring;
use App\User;

class KetringController extends Controller
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

    public function lainnya()
    {
        //
        return view('lainnya.detail');
    }

    public function ketring()
    {
        //
        return view('crud.ketring');
    }

    public function liat()
    {
        //
        $ketrings = Ketring::orderBy('id','DESC')->paginate(4);
        return view('crud.read.showketring',compact('ketrings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeketring(Request $request)
    {
        //
        $tambah = new Ketring();
        $tambah->user_id =  auth()->id();
        $tambah->nama = $request->get('nama');
        $tambah->slug_ketring = Str::slug($request->get('nama'));
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
        $tampilkan = Ketring::where('slug_ketring',$slug)->first();
        return view('crud.read.rmketring',compact('tampilkan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editketring($id)
    {
        //
        $tampiledit = Ketring::where('id', $id)->first();
        return view('crud.update.updateketring')->with('tampiledit', $tampiledit);
        
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
        $update = Ketring::where('id', $id)->first();
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

        return redirect()->to('/showketring');
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
        $hapus = Ketring::find($id);
        $hapus->delete();

        return redirect()->to('/showketring');
    }
}
