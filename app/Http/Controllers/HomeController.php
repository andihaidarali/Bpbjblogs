<?php

namespace BPBJ\Http\Controllers;

use BPBJ\Blog;
use BPBJ\Galeri;
use BPBJ\Image;
use BPBJ\Produk;
use BPBJ\Vidgal;
USE BPBJ\Agenda;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where('cat', '=', 0)->count();
        $produk = Produk::all(); 
        $galeri = Galeri::all();
        $video = Vidgal::all()->count();
        $agenda = Agenda::orderBy('jadwal', 'DESC')->take(5)->get();
        $kilas = Blog::where('cat', '=', 1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('home', compact('blog', 'produk', 'galeri', 'video', 'agenda', 'kilas'));
    }
}
