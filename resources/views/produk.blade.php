@extends('layouts.app')

@section('content')
<div id="main-right" class="span9">
    <div id="main-left" class="span12">
        <article class="post">
            <h2 class="entry-title">
                <span class="the_title">Produk BPBJ Pasangkayu</span>
            </h2>
        </article>
        <div class="entry-content">
        <table class="table table-hover text-nowrap">
            <thead>
                <th>Nama Produk</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                <tr>
                    <td>
                        <strong>{{$item->nama_produk}}
                    </td> 
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{asset('upload/produk/'.$item->filename)}}" target="_blank">Download</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$produk->links()}}
        </div>
    </div>	
</div>
@endsection
