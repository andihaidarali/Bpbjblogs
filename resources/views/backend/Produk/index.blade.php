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
                <h3 class="card-title">Daftar Produk</h3>
                <a class="float-right btn btn-xs bg-gradient-primary" href="{{route('Produk.create')}}"><span class="far fa-plus-square"></span> Tambah Produk</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                                <tr>
                                    <td>{{$item->published}}</td>
                                    <td>{{$item->nama_produk}}</td>
                                    <td class="align-right">
                                        <form action="{{route('Produk.destroy', $item->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a class="btn btn-xs btn-outline-success" href="{{route('Produk.edit', $item->id)}}">edit</a>
                                            <button class="btn btn-xs btn-outline-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$produk->links()}}
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

