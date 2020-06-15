@extends('layouts.backend')

@section('headlink')
    
@endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2 class="card-title">Buat Album {{$name}}</h2>
                <br />
                <hr />
                <form action="{{route('Video-galeri.store')}}" method="POST"  >
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Nama Album {{$name}}">
                    @if ($name == 'Video')
                        <input type="hidden" name="vidgal_type" value="0">
                    @else
                        <input type="hidden" name="vidgal_type" value="1">
                    @endif
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('judul') }}</strong>
                        </span>
                    @endif
                    <br />
                    <textarea class="form-control" name="deskripsi" id="desk" rows="10" placeholder="Deskripsi Album {{$name}}"></textarea>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('deskripsi') }}</strong>
                        </span>
                    @endif
                    <hr />
                    <button class="btn btn-block btn-primary" type="submit">Buat Album {{$name}}</button>
                </form>
                <!-- /.card-body -->
            </div>
            <div class="col-8">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-video"></i> List Album {{$name}}</h3>
                    <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        {{$list->links()}}
                    </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Tanggal</th>
                            <th>Judul Album {{$name}}</th>
                            <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{date('d, M Y | H:i', strtotime($item->created_at))}}</td>
                                    <td>{{$item->title}} <span class="float-right badge bg-warning">{{$item->videos()->count()}} Video</span></td>
                                    <td>
                                        <form action="{{route('Video-galeri.destroy', $item->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            @if ($name == 'Video')
                                                <a href="{{route('Video-galeri.edit', $item->id)}}" class="btn btn-xs bg-info">Manage</a>
                                            @else
                                                <a href="{{route('Video-galeri.tutoredit', $item->id)}}" class="btn btn-xs bg-info">Manage</a>
                                            @endif
                                            <button class="btn btn-xs btn-outline-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection


