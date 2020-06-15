@extends('layouts.backend')

@section('headlink')
    <link rel="stylesheet" href="{{asset('template/backend/plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <form action="{{route('Blog.store')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12">
            <!-- Judul Artikel -->
            <div class="form-group">
                <label for="judul_berita">Kilas Informasi</label>
                {{ csrf_field() }}
                <input type="hidden" name="cat" value="1">
                <input type="text" name="judul" class="form-control" id="judul_berita" placeholder="Judul Kilas Informasi">
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
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('backend')}}" class="btn btn-block btn-outline-secondary btn-flat"><span class="fas fa-arrow-circle-left "></span> Kembali</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-block btn-outline-primary btn-flat">Terbitkan</button>
            </div>
            <div class="mb-5"></div>
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
            placeholder: 'Isi Kilas Informasi !',
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
    });
    </script>
@endsection

