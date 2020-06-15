<?php

namespace BPBJ\Http\Controllers;

use BPBJ\Sop;
use BPBJ\Sopdoc;
use Illuminate\Http\Request;
use Validator;

class SopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /* HALAMAN ALBUM STANDAR OPERASIONAL TYPE = 0 */
    public function index()
    {
        $name = "Standar Operasional";
        $list = Sop::where('sopgal_type', '=', 0)->paginate(10);
        return view('backend.Sop.index', compact('list', 'name'));
    }

    /* HALAMAN ALBUM STANDAR DOKUMEN TYPE = 1 */
    public function doc()
    {
        $name = "Standar Dokumen";
        $list = Sop::where('sopgal_type', '=', 1)->paginate(10);
        return view('backend.Sop.index', compact('list', 'name'));
    }

    /* HALAMAN ALBUM 17 STANDAR LPSE TYPE = 2 */
    public function lpse()
    {
        $name = "Standar LPSE";
        $list = Sop::where('sopgal_type', '=', 2)->paginate(10);
        return view('backend.Sop.index', compact('list', 'name'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'deskripsi' => 'required',
            'sopgal_type' => 'required',
        ]);

        $sopdir = new Sop();
        $sopdir->title = $request->judul;
        $sopdir->slug = str_slug($request->judul);
        $sopdir->deskripsi = $request->deskripsi;
        $sopdir->sopgal_type = $request->sopgal_type;
        $sopdir->save();

        return redirect()->back();
    }

    public function show(Sop $sop)
    {
        //
    }

    public function edit($sop)
    {
        $name = 'Standar Operasional';
        $dir = Sop::findOrFail($sop);
        return view('backend.Sop.edit', compact('dir', 'name'));
    }

    public function doc_edit($doc)
    {
        $name = 'Standar Dokumen';
        $dir = Sop::findOrFail($doc);
        return view('backend.Sop.edit', compact('dir', 'name'));
    }

    public function lpse_edit ($lpse)
    {
        $name = 'Standar LPSE';
        $dir = Sop::findOrFail($lpse);
        return view('backend.Sop.edit', compact('dir', 'name'));
    }
    
    public function update(Request $request, $sop)
    {
        $Sopdir = Sop::findOrFail($sop);
        
        $Sopdir->title = $request->title;
        $Sopdir->deskripsi = $request->deskripsi;

        $Sopdir->save();
        return redirect()->back();
    }

    public function uploadfiles(Request $request)
    {
        $rules = array(
            'file' => 'required|mimes:docx,xls,xlsx,pdf,doc|max:20000',
            'judul' => 'required|min:5',
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'errors' => $error->errors()->all()
            ]);
        }

        $file = $request->file('file');
        $filename = time().'_BPBJdocs'.'.'.$file->getClientOriginalExtension();
        $location = public_path('upload/dokumen/'.$filename);
        $file->move('upload/dokumen/', $filename);
        $Sopdir = Sop::find($request->sop_id);

        $Sopdoc = $Sopdir->sopdocs()->create([
            'sop_id' => $request->sop_id,
            'doc_title' => $request->judul,
            'filename' =>  $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientOriginalExtension(),
        ]);
        $output = array(
            'success' => 'Dokumen Berhasil Diupload',
            'doc_title' => $request->judul,
            'filename' =>  $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientOriginalExtension(),
            'sop_id' => $Sopdoc->id,
        );

        return response()->json($output);
    }

    public function deletefiles(Request $request)
    {
        $Sopdocs = Sopdoc::findOrFail($request->files_id);
        $filepath = "upload/dokumen/{$Sopdocs->filename}";
        unlink(public_path($filepath));
        $Sopdocs->delete();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $Sopdir = Sop::findOrFail($id);
        $Sopdoc = $Sopdir->sopdocs();

        foreach ($Sopdir->sopdocs as $item) {
            $filepath = "upload/dokumen/{$item->filename}";
            unlink(public_path($filepath));
        }
        $Sopdir->sopdocs()->delete();
        $Sopdir->delete();

        return redirect()->back();
    }
}
