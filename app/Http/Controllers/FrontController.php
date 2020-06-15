<?php

namespace BPBJ\Http\Controllers;

use Illuminate\Http\Request;
use BPBJ\Blog;
use BPBJ\Galeri;
use BPBJ\Vidgal;
use BPBJ\Video;
use BPBJ\Agenda;
use BPBJ\Produk;
use BPBJ\Sop;

class FrontController extends Controller
{
    public function index()
    {
        $berita = Blog::where('cat', '=', 0)->orderBy('created_at', 'DESC')->take(5)->get();
        $galeri = Galeri::orderBy('id', 'DESC')->take(5)->get();
        $produk = Produk::orderBy('id', 'DESC')->take(4)->get();
        $tutor = Vidgal::orderBy('id', 'DESC')->where('vidgal_type', '=', 1)->take(4)->get();
        return view('index', compact('berita', 'galeri', 'produk', 'tutor'));
    }

    public function beritaindex()
    {
        $berita = Blog::where('cat', '=', 0)->orderBy('created_at', 'DESC')->paginate(10);
        return view('blog', compact('berita'));
    }

    public function show($slug){
        $berita = Blog::where('slug', $slug)->first();
        $related = Blog::where('cat', '=', 0)->orderBy('created_at', 'DESC')->take(5)->get();
        return view('beritadetails', compact('berita', 'related'));
    }

    public function foto()
    {
        $galeri = Galeri::orderBy('id', 'DESC')->paginate(10);
        return view('galerifoto', compact('galeri'));
    }

    public function fotoshow($foto)
    {
        $galeri = Galeri::where('id', $foto)->first();
        return view('galerifotoshow', compact('galeri'));
    }

    public function video()
    {
        $name = 'video';
        $galeri = Vidgal::orderBy('id', 'DESC')->where('vidgal_type', '=', 0)->paginate(10);
        return view('galerivideo', compact('galeri', 'name'));
    }

    public function videoshow($video)
    {
        $galeri = Vidgal::where('id', $video)->first();
        return view('galerivideoshow', compact('galeri'));
    }
    public function tutor()
    {
        $name = 'tutorial';
        $galeri = Vidgal::orderBy('id', 'DESC')->where('vidgal_type', '=', 1)->paginate(10);
        return view('galerivideo', compact('galeri', 'name'));
    }

    public function tutorshow($tutor)
    {
        $galeri = Vidgal::where('id', $tutor)->first();
        return view('galerivideoshow', compact('galeri'));
    }
    public function produk()
    {
        $produk = Produk::orderBy('id', 'DESC')->paginate(10);
        return view('produk', compact('produk'));
    }

    public function produkshow($produk)
    {
        $produk = Produk::where('id', $tutor)->first();
        return view('produkshow', compact('produk'));
    }
    public function cari(Request $request)
    {
        $this->validate($request, [
            'cari' => 'required',
        ]);
        $cari = $request->cari;
        $berita = Blog::where('title', 'LIKE', '%'.$cari.'%')->orWhere('post_content', 'LIKE', '%'.$cari.'%')->paginate(10);
        if (count($berita) > 0) {
            return view('blog', compact('berita'));
        }
    }

    public function Sop()
    {
        $nama = "Standar Operasional Prosedur";
        $direktori = Sop::where('sopgal_type', 0)->orderBy('created_at', 'DESC')->paginate(10);
        return view('Sop', compact('direktori', 'nama'));
    }

    public function Sopdoc()
    {
        $nama = "Standar Dokumen";
        $direktori = Sop::where('sopgal_type', 1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('Sop', compact('direktori', 'nama'));
    }

    Public Function Soplpse()
    {
        $nama = "Standarisasi LPSE";
        $direktori = Sop::where('sopgal_type', 2)->orderBy('created_at', 'DESC')->paginate(10);
        return view('Sop', compact('direktori', 'nama'));
    }

    public function Sopdir($slug)
    {
        $dir = Sop::where('slug', $slug)->orderBy('created_at', 'DESC')->first();
        return view('Sopview', compact('dir'));
    }
}
