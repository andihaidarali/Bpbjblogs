@extends('layouts.backend')

@section('headlink')
    
@endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">List Berita</h3>
                <a class="float-right btn btn-xs bg-gradient-primary" href="{{route('Blog.create')}}"><span class="far fa-plus-square"></span> Buat Berita</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $item)
                                <tr>
                                    <td>{{date('d, M Y | H:i', strtotime($item->created_at))}}</td>
                                    <td>{{$item->title}}</td>
                                    <td class="align-right">
                                        <form action="{{route('Blog.destroy', $item->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a class="btn btn-xs btn-outline-success" href="{{route('Blog.edit', $item->id)}}">edit</a>
                                            <button class="btn btn-xs btn-outline-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$blog->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('footscript')
    <script>
        $(function () {
            $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            });
        });
    </script>
@endsection
