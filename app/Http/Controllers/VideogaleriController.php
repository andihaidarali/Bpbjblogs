<?php

namespace BPBJ\Http\Controllers;

use Illuminate\Http\Request;
use BPBJ\Vidgal;
use BPBJ\Video;
use Validator;

class VideogaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $name = 'Video';
        $list = Vidgal::where('vidgal_type', '=', 0)->paginate(10);
        return view('backend.Galeri.video.index', compact('list', 'name'));
    }

    public function tutor(){
        $name = 'Tutorial';
        $list = Vidgal::where('vidgal_type', '=', 1)->paginate(10);
        return view('backend.Galeri.video.index', compact('list', 'name'));
    }
    public function create(){
        return route('Video-galeri.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'deskripsi' => 'required',
        ]);

        $galeri = new Vidgal();
        $galeri->title = $request->judul;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->vidgal_type = $request->vidgal_type;
        $galeri->save();

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $name = 'Video';
        $galeri = Vidgal::findOrFail($id);
        return view('backend.Galeri.Video.edit', compact('galeri', 'name'));
    }

    public function tutoredit($id)
    {
        $name = 'Tutorial';
        $galeri = Vidgal::findOrFail($id);
        return view('backend.Galeri.Video.edit', compact('galeri', 'name'));
    }

    public function update(Request $request, $id)
    {
        $vidgaledit = Vidgal::findOrFail($id);
        
        $vidgaledit->title = $request->title;
        $vidgaledit->deskripsi = $request->deskripsi;

        $vidgaledit->save();
        return redirect()->back();
    }

    public function uploadvideo(Request $request){
        $rules = array(
            'file' => 'required|mimes:mp4,flv|max:200000',
            'judul' => 'required|min:5',
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        $file = $request->file('file');
        $filename = time().'_BPBJvids'.'.'.$file->getClientOriginalExtension();
        $location = public_path('upload/galeri/video/'.$filename);
        $file->move('upload/galeri/video/', $filename);
        $galeri = Vidgal::find($request->vidgal_id);

        $video = $galeri->videos()->create([
            'vidgal_id' => $request->galeri_id,
            'video_title' => $request->judul,
            'filename' =>  $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
        ]);
        $output = array(
            'success' => 'Video Berhasil Diupload',
            'video_title' => $request->judul,
            'filename' =>  $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'video_id' => $video->id,
        );

        return response()->json($output);
    }

    public function deletevideos(Request $request){
        $videogals = Video::findOrFail($request->video_id);
        $filepath = "upload/galeri/video/{$videogals->filename}";
        unlink(public_path($filepath));
        $videogals->delete();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $galerivids = Vidgal::findOrFail($id);
        $vids = $galerivids->videos();

        foreach ($galerivids->videos as $item) {
            $filepath = "upload/galeri/video/{$item->filename}";
            unlink(public_path($filepath));
        }
        $galerivids->videos()->delete();
        $galerivids->delete();

        return redirect()->back();
    }
}
