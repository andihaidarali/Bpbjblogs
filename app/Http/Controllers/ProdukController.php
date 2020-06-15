<?php

namespace BPBJ\Http\Controllers;

use BPBJ\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    
    public function index()
    {
        $produk = Produk::paginate(10);
        return view('backend.Produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required|min:5',
            'tahun' => 'required',
            'dokumen' => 'required|mimetypes:application/pdf|max:5000',
        ]);

        $produk                 = new Produk();
        $produk->nama_produk    = $request->nama_produk;         
        $produk->published      = $request->tahun;

        if ($request->hasFile('dokumen')) {
            $doc                = $request->file('dokumen');
            $filename           = 'BPBJDOC_'.$request->tahun.'-'.$request->nama_produk.'.'.$doc->getClientOriginalExtension();
            $doc->move('upload/produk/', $filename);

            $produk->filename   = $filename;
        }
        
        $produk->save();

        return redirect()->route('Produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('backend.Produk.edit', compact('produk'));
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
        $updateproduk = Produk::findOrFail($id);
        $updateproduk->nama_produk =  $request->nama_produk;
        $updateproduk->published = $request->tahun;

        if($request->hasFile('dokumen')){
            $doc                = $request->file('dokumen');
            $filename           = 'BPBJDOC_'.$request->tahun.'-'.$request->nama_produk.'.'.$doc->getClientOriginalExtension();
            $oldfilename        = $updateproduk->filename;
            $oldpath            = "upload/produk/{$oldfilename}";
            unlink(public_path($oldpath));

            $doc->move('upload/produk/', $filename);
            $updateproduk->filename = $filename;
        }
        $updateproduk->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $oldfilename        = $produk->filename;
        $oldpath            = "upload/produk/{$oldfilename}";
        unlink(public_path($oldpath));

        $produk->delete();
        
        return redirect()->route('Produk.index');
    }
}
