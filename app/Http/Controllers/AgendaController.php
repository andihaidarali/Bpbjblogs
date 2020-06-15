<?php

namespace BPBJ\Http\Controllers;

use BPBJ\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $agenda = Agenda::paginate(10);
        return view('backend.Agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('Agenda.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            "nama_agenda" => 'required|min:3', 
            "jadwal" => 'required',
            "deskripsi" => 'required',
        ]);

        $agenda = new Agenda();
        $agenda->Nama_agenda = $request->nama_agenda;
        $agenda->jadwal = $request->jadwal.':00';
        $agenda->deskripsi = $request->deskripsi;
        $agenda->status = 0;

        $agenda->save();

        return back();
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
        $agenda = Agenda::findOrFail($id);
        return view('backend.Agenda.edit', compact('agenda'));
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
        $agenda = Agenda::findOrfail($id);
        $agenda->Nama_agenda = $request->nama_agenda;
        $agenda->jadwal = $request->jadwal.':00';
        $agenda->deskripsi = $request->deskripsi;
        $agenda->status = $request->status;

        $agenda->save();

        return redirect()->route('Agenda.index');
    }
    public function setstatus(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->status = 1;

        $agenda->save();

        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return back();
    }
}
