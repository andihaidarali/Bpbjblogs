@extends('layouts.backend')

@section('headlink')
    <link rel="stylesheet" href="{{asset('template/backend/plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <form action="{{route('Blog.store')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
            <!-- Judul Artikel -->
            <div class="form-group">
                <label for="judul_berita">Judul</label>
                {{ csrf_field() }}
                <input type="hidden" name="cat" value="0">
                <input type="text" name="judul" class="form-control" id="judul_berita" placeholder="Judul Artikel">
            </div>
            <div class="mb-3"></div>
            <!-- Default box -->
            <div class="card card-outline card-info">
                <div class="card-body">
                    <div class="mb-3">
                        
                        <!-- isi berita -->
                        <div class="form-group">
                            <textarea name="isi_blog" id="summernote" class="textarea" style="width: 100%; height: 500px;"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Faetured Images</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-danger" id="hpsgbr" style="display:none"><i class="fas fa-times"></i> hapus</button>
                        </div>                     
                    </div>
                    <div class="card-body">
                        <img id="fotopreview" src="{{asset('template/frontend/images/no_images.jpg')}}" alt="preview foto" style="width:100%;display:none">
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="gambar" name="gambar">
                        </div>     
                    </div>
                </div>
                
                <div class="mb-3"></div>
                <a href="{{route('Blog.index')}}" class="btn btn-block btn-outline-secondary btn-flat"><span class="fas fa-arrow-circle-left "></span> Kembali</a>
                <button type="submit" class="btn btn-block btn-outline-primary btn-flat">Terbitkan</button>
            </div>
        </div>
    </form>
    </div>
</section>
@endsection

@section('footscript')
    <!-- Summernote -->
    <script src="{{asset('template/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
    $(function () {
        // Summernote
        $('#summernote').summernote({
            placeholder: 'Tulis Artikel !',
            tabsize: 2,
            height: 400,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        //clear gambar preview dan input values
        document.getElementById('hpsgbr').onclick = function(){
            document.getElementById('gambar').value = "";
            document.getElementById('fotopreview').style = 'display:none;';
            document.getElementById('fotopreview').src = '';
            document.getElementById('hpsgbr').style = "display:none";
        }
    });
    $("#gambar").change(function() {
        readURL(this);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#fotopreview').attr('src', e.target.result);
            $('#fotopreview').attr('style', 'width:100%;display:block;');
            $('#hpsgbr').attr('style', '');
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    };
    </script>
@endsection

