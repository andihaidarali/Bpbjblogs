@extends('layouts.app')

@section('content')
<div id="main-right" class="span9">
    <div id="main-left" class="span12">
        <article class="post">
            <h2 class="entry-title">
                <span class="the_title">Index Album Foto</span>
            </h2>
        </article>
        <div class="entry-content">
        <table class="table table-hover text-nowrap">
            <thead>
                <th>Album Foto</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($galeri as $item)
                <tr>
                    <td>
                        <strong>{{$item->title}}
                    </td> 
                    <td>
                        <a href="{{url('foto', $item->id)}}">Lihat galeri</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$galeri->links()}}
        </div>
    </div>	
</div>
@endsection
