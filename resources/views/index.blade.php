@extends('layouts.app')
@section('content')
    <div id="main-right" class="span9">
        <div id="slider">
            <div class="label-text span7" style="border-bottom: 2px solid #b00;">
            <div class="terkini">Berita Terbaru</div>
            <div class="index"><a href="{{url('/berita')}}">Index</a></div>
            </div>
            <br/>
            <ul class="img_slides" >
                @foreach ($berita as $item)
                    <li>
                        <div class='intro'>
                            <div class='title'><a href='{{url('berita', $item->slug)}}'>{{$item->title}}</a></div>
                            <div class='date_time'>{{date('d, F Y | H:i', strtotime($item->created_at))}} WITA</div>
                            <div id="konten">
                                @php
                                    $datapost =  strip_tags($item->post_content);
                                @endphp
                                {{ \Illuminate\Support\Str::words($datapost, 250) }}
                            </div>
                        </div>
                        <img class='span5' src="{{asset('upload/gambar/'. $item->images)}}" style="height:auto;"/>
                    </li>
                @endforeach
            </ul>
        </div>

        <div style="display:inline;margin-top:-10px;margin-bottom:-20px;">
            <div id="gallery" class="fl span12">
                <div class="title-produk"><span>Galeri BPBJ</span></div>
                <div id="content">
                    <div class="galeri">
                        @foreach ($galeri as $item)
                            @php
                                $hitung = 0;
                            @endphp
                            @foreach ($item->images as $gambar)
                                @php
                                    if ($hitung == 1) break; 
                                @endphp
                                <div class="image">
                                    <a href="{{route('foto.show', $item->id)}}">
                                        <img class="card-img-top" src="{{asset('upload/galeri/'.$gambar->filename)}}" alt="Card image cap">
                                        <div class="slide__caption">{{$item->title}}</div>
                                    </a>
                                </div>
                                @php
                                    $hitung++;
                                @endphp
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div style="display:inline;margin-top:-10px;margin-bottom:-20px;">
            <div id="gallery" class="fl span6">
            <div class="title-produk"><span>Produk</span></div>
                <ul id="list_produk" class="span3">
                    @foreach ($produk->chunk(2) as $chunk)
                        <li style='height:135px;'>
                            @foreach ($chunk as $item)
                                <a href="#">
                                    <div class='item-produk' >
                                        <div class='item-title'>{{$item->nama_produk}}</div>
                                    </div>
                                </a>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="gallery" class="fl span6">
            <div class="title-produk"><span>Tutorial</span></div>
            <ul id="list_agenda" class="span3">
                    @foreach ($tutor->chunk(2) as $chunk)
                        <li style='height:135px;'>
                            @foreach ($chunk as $item)
                                <a href="#">
                                    <div class='item-produk' >
                                        <div class='item-title'>{{$item->title}}</div>
                                    </div>
                                </a>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
        </div>
        </div>
        <div style="display:inline;margin-top:-10px;">
        <div id="gallery" class="fl span6">
        <div class="title-produk"><span>List Item 3</span></div>
            <ul id="list_agenda" class="span3">
                <li><a href="#">LIST ITEM 1</a></li>
                <li><a href="#">LIST ITEM 2</a></li>
                <li><a href="#">LIST ITEM 3</a></li>
            </ul>
        </div>
        <div id="gallery" class="fl span6">
        <div class="title-produk"><span>LIST ITEM 4</span></div>
            <ul id="list_agenda" class="span3">
                <li><a href="#">LIST ITEM 1</a></li>
                <li><a href="#">LIST ITEM 2</a></li>
                <li><a href="#">LIST ITEM 3</a></li>
            </ul>
        </div>
        </div>
    </div>

@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            $('.galeri').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        });
    </script>
@endsection