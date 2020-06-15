@extends('layouts.app')

@section('content')
<div id="main-right" class="span9">
    <div id="main-left" class="span12">
        <article class="post">
            <h2 class="entry-title">{{$berita->title}}</h2>
        </article>
        <div class='date_time'>{{date('d, F Y | H:i', strtotime($berita->created_at))}} WITA</div>
        <div class="entry-content">
        <img src="{{asset('upload/gambar/'.$berita->images)}}" style="width:100%;">
        <hr />
        {!!$berita->post_content!!}
        <hr />
        <ul>
            @foreach ($related as $item)

            @if ($item->title != $berita->title)
                <li>
                    <a href="{{url('berita', $item->slug)}}">{{$item->title}}</a>
                </li>
            @endif
            @endforeach
        </ul>
        </div>
    </div>	
</div>
@endsection
