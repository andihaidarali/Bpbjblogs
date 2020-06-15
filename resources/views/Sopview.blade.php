@extends('layouts.app')

@section('content')
<div id="main-right" class="span9">
    <div id="main-left" class="span12">
        <article class="post">
            <h2 class="entry-title">Direktori {{$dir->title}}</h2>
        </article>
        <div class='date_time'>{{date('d, F Y | H:i', strtotime($dir->created_at))}} WITA</div>
        <div class="entry-content">
        {{$dir->deskripsi}}
        <hr />
        <table class="table table-striped">
            <thead>
                <th>Nama Dokumen</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($dir->sopdocs as $item)
                    <tr>
                        <td>
                            {{$item->doc_title}}
                        </td>
                        <td>
                            <a href="{{asset('upload/dokumen/'. $item->filename)}}" download class="btn btn-success btn-sm">
                                Download File
                            </a>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>	
</div>
@endsection