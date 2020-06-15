@extends('layouts.backend')

@section('headlink')

@endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <form action="{{route('Produk.store')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Info !</h5>
                Format Penulisan Nama Produk Adalah : <strong class="text-warning">Peraturan/SK-No-Tahun-Tentang</strong>
            </div>
            <!-- Judul Artikel -->
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                {{ csrf_field() }}
                <input type="text" name="nama_produk" class="form-control" id="nama_produk" placeholder="Nama Produk">
            </div>
            <div class="form-group">
                <label>Tahun Produk:</label>
                <select class="form-control" name="tahun" id="tahun">
                    @php
                        $tg_awal= date('Y')-6;
                        $tgl_akhir= date('Y')+1;
                        for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                        {
                        echo "<option value='$i'";
                            if(date('Y')==$i){echo "selected";}
                        echo">$i</option>";
                        }
                    @endphp
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
                    <iframe id="fotopreview"  style="width:100%;height:700px;"></iframe>
                </div>
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Upload PDF Document</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-danger" id="hpsgbr" style="display:none"><i class="fas fa-times"></i> hapus</button>
                        </div>                     
                    </div>
                    <div class="card-body">
                        <iframe id="fotopreview" src="#" style="width:100%;height:300px;display:none"></iframe>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="dokumen" name="dokumen">
                        </div>     
                    </div>
                </div>
                
                <div class="mb-3"></div>
                <a href="{{route('Produk.index')}}" class="btn btn-block btn-outline-secondary btn-flat"><span class="fas fa-arrow-circle-left "></span> Kembali</a>
                <button type="submit" class="btn btn-block btn-outline-primary btn-flat">Terbitkan</button>
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

