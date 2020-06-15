@extends('layouts.app')

@section('content')
<div id="main-right" class="span9">
    <div id="main-left" class="span12">
        <article class="post">
            <h2 class="entry-title">
                <span class="the_title">Index Berita</span>
            </h2>
        </article>
        <div class="entry-content">
        <table class="table table-hover text-nowrap">
            <tbody>
            @if($berita != NULL)
                @foreach ($berita as $item)
                    <tr>
                        <td><strong><a href="{{url('berita', $item->slug)}}">{{$item->title}}</a></td> <td></strong>{{date('d, F Y', strtotime($item->created_at))}} WITA</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2">Tidak Ditemukan</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{$berita->links()}}
        </div>
    </div>	
</div>
@endsection
