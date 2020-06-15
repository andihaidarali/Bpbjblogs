@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="{{asset('template/backend/plugins/fancybox/jquery.fancybox.min.css')}}">
@endsection

@section('content')
<div id="main-right" class="span9">
    <div id="main-left" class="span12">
        <article class="post">
            <h2 class="entry-title">{{$galeri->title}}</h2>
        </article>
        <div class='date_time'>{{date('d, F Y | H:i', strtotime($galeri->created_at))}} WITA</div>
        <div class="entry-content">
        {{$galeri->deskripsi}}
        <hr />
        @foreach ($galeri->images as $item)
            <a href="{{asset('upload/galeri/'. $item->filename)}}" data-fancybox="gallery" class="col-sm-4">
                <img src="{{asset('upload/galeri/'. $item->filename)}}" class="img-fluid" style="width:150px;height:150px;margin:5px;">
            </a>
        @endforeach
        </div>
    </div>	
</div>
@endsection

@section('footer')
    <script src="{{asset('template/backend/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
    <script>
        $().fancybox({
            selector : '.imglist a:visible'
        });
    </script>
@endsection