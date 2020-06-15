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
        <table class="table table-striped">
            <thead>
                <th>Judul Video</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($galeri->videos as $item)
                    <tr>
                        <td>
                            {{$item->video_title}}
                        </td>
                        <td>
                            <a href="{{asset('upload/galeri/video/'. $item->filename)}}" data-width="640" data-height="360" data-fancybox="gallery" class="col-sm-4">
                                Lihat Video
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

@section('footer')
    <script src="{{asset('template/backend/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
    <script>
        $().fancybox({
            selector : '.imglist a:visible'
        });
    </script>
@endsection