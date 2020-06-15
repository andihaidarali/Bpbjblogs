<?php

namespace BPBJ\Http\Controllers;

use Image;
use BPBJ\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $blog = Blog::where('cat', '=', 0)->paginate(10);
        return view('backend.Blog.index', compact('blog'));
    }

    public function create()
    {
        return view('backend.Blog.create');
    }

    public function store(Request $request)
    {
        if ($request->cat == 0) {
            $this->validate($request, [
                'judul' => 'required|min:15',
                'isi_blog' => 'required',
                'gambar' => 'file|image|mimes:jpeg,png,jpg|max:5000',
                'cat' => 'required',
            ]);
        }elseif ($request->cat == 1) {
            $this->validate($request, [
                'judul' => 'required|min:15',
                'isi_blog' => 'required',
                'cat' => 'required',
            ]);
        }
        
        $blog = new Blog();
        $blog->title = $request->judul;
        $blog->slug = str_slug($request->judul);
        $blog->post_content = $request->isi_blog;
        $blog->cat = $request->cat;

        if ($request->cat == 0) {
            // images
            if($request->hasFile('gambar')){
                $image = $request->file('gambar');
                $filename = time().'_bpbj'.'.'.$image->getClientOriginalExtension();
                $location = public_path('upload/gambar/'.$filename);
                Image::make($image)->save($location);
                $blog->images = $filename; 
            }
        }elseif($request->cat == 1){
            $blog->images = 'NONE';
        }

        $blog->save();

        if ($request->cat == 0) {
            return redirect()->route('Blog.edit', $blog->id);
        }else if($request->cat == 1){
            return redirect()->route('kilas.edit', $blog->id);
        }
        
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        return view('backend.Blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {

        $update_blog                = Blog::find($id);
        $update_blog->title         = $request->judul;
        $update_blog->slug          = str_slug($request->judul);
        $update_blog->post_content  = $request->isi_blog;

        if ($request->cat == 0){
            // images
            if($request->hasFile('gambar')){
                $image = $request->file('gambar');
                $filename = time().'_bpbj'.'.'.$image->getClientOriginalExtension();
                $location = public_path('upload/gambar/'.$filename);
                Image::make($image)->save($location);
                $update_blog->images = $filename; 
            }else{
                $update_blog->images = $request->gambar_hiden;
            }
        }else if($request->cat == 1){
            $update_blog->images = "NONE";
        }

        $update_blog->save();

        if ($update_blog->cat = 0) {
            return redirect()->route('Blog.edit', $id);
        }else if($update_blog->cat = 1){
            return redirect()->route('kilas.edit', $id);
        }
        
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        File::delete('upload/gambar/' . $blog->images);
        return redirect()->back();
    }

    public function kilas(){
        return view('backend.Blog.kilas');
    }

    public function kilasedit($id){
        $blog = Blog::where('id', $id)->first();
        return view('backend.Blog.kilasedit', compact('blog'));
    }
    
    public function show($id)
    {
        //
    }

}
