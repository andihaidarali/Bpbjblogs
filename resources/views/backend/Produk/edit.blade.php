@extends('layouts.backend')

@section('headlink')

@endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <form action="{{route('Produk.update', $produk->id)}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
            <!-- Judul Artikel -->
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="{{$produk->nama_produk}}">
            </div>
            <div class="form-group">
                <label>Tahun Produk:</label>
                <select class="form-control" name="tahun" id="tahun">
                    @php
                        $tg_awal= date('Y')-6;
                        $tgl_akhir= date('Y')+1;
                        $year = date('Y');
                    @endphp

                    @for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                        <option value="{{$i}}" {{$i == $produk->published  ? 'selected' : ''}} >{{$i}}</option>
                    @endfor
                </select>
                <!-- /.input group -->
            </div>
            <div class="mb-5"></div>
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Preview Documents</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-danger" id="hpsgbr" style=""><i class="fas fa-times"></i> hapus</button>
                    </div>
                </div>
                <div class="card-body">
                    <iframe id="fotopreview" src="{{asset('upload/produk/'.$produk->filename)}}" style="width:100%;height:700px;"></iframe>
                </div>
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Upload PDF Document</h3>                     
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="dokumen" name="dokumen" value="{{$produk->filename}}">
                        </div>     
                    </div>
                </div>
                
                <div class="mb-3"></div>
                <a href="{{route('Produk.index')}}" class="btn btn-block btn-outline-secondary btn-flat"><span class="fas fa-arrow-circle-left "></span> Kembali</a>
                <button type="submit" class="btn btn-block btn-outline-success btn-flat">Edit</button>
            </div>
        </div>
    </form>
    </div>
</section>
@endsection

@section('footscript')
    <script src="{{asset('template/backend/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('template/backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    </script>
    <script>
        $(function(){
            document.getElementById('hpsgbr').onclick = function(){
                document.getElementById('dokumen').value = "";
                document.getElementById('fotopreview').style = 'display:none;';
                document.getElementById('fotopreview').src = '';
                document.getElementById('hpsgbr').style = "display:none";
            }
        });

        $("#dokumen").change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#fotopreview').attr('src', e.target.result);
                $('#fotopreview').attr('style', 'width:100%;height:300px;display:block;');
                $('#hpsgbr').attr('style', '');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        };
    </script>
@endsection

