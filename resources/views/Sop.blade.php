@extends('layouts.app')

@section('content')
<div id="main-right" class="span9">
    <div id="main-left" class="span12">
        <article class="post">
            <h2 class="entry-title">
                <span class="the_title">Direktori {{$nama}}</span>
            </h2>
        </article>
        <div class="entry-content">
        <table class="table table-hover text-nowrap">
            <thead>
                <th>Nama Direktori</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($direktori as $item)
                <tr>
                    <td>
                        <strong>{{$item->title}}
                    </td> 
                    <td>
                        <a href="{{url('direktori', $item->slug)}}">Lihat Direktori</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$direktori->links()}}
        </div>
    </div>	
</div>
@endsection
