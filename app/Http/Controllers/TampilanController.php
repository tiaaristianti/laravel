<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Dekor;
use App\Ketring;
use App\Fotografi;
use App\Venue;
use App\Rias;
use App\User;

class TampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Dekor::orderBy('id','DESC')->paginate(4);
        $ketrings = Ketring::orderBy('id','DESC')->paginate(4);
        $fotos = Fotografi::orderBy('id','DESC')->paginate(4);
        $venues = Venue::orderBy('id','DESC')->paginate(4);
        $riasbs = Rias::orderBy('id','DESC')->paginate(4);
        return view('home.home',compact('datas','ketrings','fotos','venues','riasbs'));
        // $datas = Dekorasi::orderBy('id','ASC')->paginate(6);
        // return view('home.home',compact('datas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crud.add');
    }

    public function liat()
    {
        //
        $datas = Dekor::orderBy('id','DESC')->paginate(4);
        return view('crud.read.showdekor',compact('datas'));
    }

    public function dekorasi()
    {
        //
        return view('crud.dekorasi');
    }

    public function detail()
    {
        //
        return view('detail.index');
    }


    public function home()
    {
        //
        $datas = Dekor::orderBy('id','DESC')->paginate(4);
        $ketrings = Ketring::orderBy('id','DESC')->paginate(4);
        $fotos = Fotografi::orderBy('id','DESC')->paginate(4);
        $venues = Venue::orderBy('id','DESC')->paginate(4);
        $riasbs = Rias::orderBy('id','DESC')->paginate(4);
        return view('home.tampilan',compact('datas','ketrings','fotos','venues','riasbs'));
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storedekor(Request $request)
    {
        //
        // $this->validate($request,
        // ['harga' => 'required']);

        $tambah = new Dekor();
        $tambah->nama = $request->get('nama');
        $tambah->user_id =  auth()->id();
        $tambah->slug_dekor = Str::slug($request->get('nama'));
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

        $tampilkan = Dekor::where('slug_dekor',$slug)->first();
        return view('crud.read.rmdekor',compact('tampilkan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editdekor($id)
    {
        //
        $tampiledit = Dekor::where('id', $id)->first();
        return view('crud.update.updatedekor')->with('tampiledit', $tampiledit);
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
        $update = Dekor::where('id', $id)->first();
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

        return redirect()->to('/showdekor');
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
        $hapus = Dekor::find($id);
        $hapus->delete();

        return redirect()->to('/showdekor');
    }
}
