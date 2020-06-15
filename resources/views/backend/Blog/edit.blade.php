@extends('layouts.backend')

@section('headlink')
    <link rel="stylesheet" href="{{asset('template/backend/plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <form action="{{route('Blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-md-8">
            <!-- Judul Artikel -->
            <div class="form-group">
                <label for="judul_berita">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul_berita" value="{{$blog->title}}">
            </div>
            <div class="mb-3"></div>
            <!-- Default box -->
            <div class="card card-outline card-info">
                <div class="card-body">
                    <div class="mb-3">
                        
                        <!-- isi berita -->
                        <div class="form-group">
                        <textarea name="isi_blog" id="summernote" class="textarea" style="width: 100%; height: 500px;">{{$blog->post_content}}</textarea>
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
                        @if(($blog->images) == NULL)
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-danger" id="hpsgbr" style="display:none;"><i class="fas fa-times"></i> hapus</button>
                            </div>
                        @else
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-danger" id="hpsgbr" ><i class="fas fa-times"></i> hapus</button>
                            </div>
                        @endif
                    </div>
                    @if(($blog->images) == NULL)
                        <div class="card-body">
                            <img id="fotopreview" src="/" alt="preview foto" style="width:100%;display:none;">
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                            </div>     
                        </div>
                    @else
                        <div class="card-body">
                            <img id="fotopreview" src="{{asset('upload/gambar/'.$blog->images)}}" alt="preview foto" style="width:100%;">
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                                <input type="hidden" class="form-control-file" id="gambar_hiden" name="gambar_hiden" value="{{$blog->images}}">
                            </div>     
                        </div>
                    @endif
                    
                    
                </div>
                
                <div class="mb-3"></div>
                <a href="{{route('Blog.index')}}" class="btn btn-block btn-outline-secondary btn-flat"><span class="fas fa-arrow-circle-left "></span> Kembali</a>
                <button type="submit" class="btn btn-block btn-outline-primary btn-flat">Update</button>
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

