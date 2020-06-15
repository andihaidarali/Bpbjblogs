<?php

namespace BPBJ\Http\Controllers;

use BPBJ\Galeri;
use BPBJ\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function backend(){
        $list = Galeri::paginate(10);
        return view('backend.Galeri.backend', compact('list'));
    }

    public function create(Request $request){
        $this->validate($request, [
            'judul' => 'required|min:5',
            'deskripsi' => 'required',
        ]);

        $galeri = new Galeri();
        $galeri->title = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        return redirect()->back();
    }

    public function show($id){
        $galeri = Galeri::findOrFail($id);
        return view('backend.Galeri.show', compact('galeri'));
    }

    public function uploadimg(Request $request){

        $file = $request->file('file');
        $filename = time().'_BPBJgal'.'.'.$file->getClientOriginalExtension();
        $location = public_path('upload/galeri/'.$filename);
        $file->move('upload/galeri/', $filename);

        $galeri = Galeri::find($request->galeri_id);
        $image = $galeri->images()->create([
            'galeri_id' => $request->galeri_id,
            'filename' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
        ]);

        return $image;
    }

    public function destroy($id){
        $galeri = Galeri::findOrFail($id);
        $images = $galeri->images();

        foreach ($galeri->images as $item) {
            $filepath = "upload/galeri/{$item->filename}";
            unlink(public_path($filepath));
        }
        $galeri->images()->delete();
        $galeri->delete();

        return redirect()->back();
    }

    public function update(Request $request, $id){
        
        $galeriedit = Galeri::findOrFail($id);
        
        $galeriedit->title = $request->title;
        $galeriedit->deskripsi = $request->deskripsi;

        $galeriedit->save();
        return redirect()->back();
    }

    public function delimg(Request $request){
        $gambar = Image::findOrFail($request->gambar_id);
        $filepath = "upload/galeri/{$gambar->filename}";
        unlink(public_path($filepath));
        $gambar->delete();

        return redirect()->back();
    }
}
