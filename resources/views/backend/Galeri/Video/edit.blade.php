@extends('layouts.backend')

@section('headlink')
    <link rel="stylesheet" href="{{asset('template/backend/plugins/dropzone/min/dropzone.min.css')}}">
    @endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Deskripsi Album {{$name}}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{$galeri->deskripsi}}</p>
                    </div>
                    <div class="card-footer">
                        @if ($name == 'Video')
                            <a class="btn btn-block btn-outline-info btn-flat" href="{{route('Video-galeri.index')}}"><span class="fas fa-arrow-circle-left"></span> Kembali</a>
                        @else
                            <a class="btn btn-block btn-outline-info btn-flat" href="{{route('Video-galeri.tutor')}}"><span class="fas fa-arrow-circle-left"></span> Kembali</a>
                        @endif
                        <button type="button" class="btn btn-block btn-outline-success btn-flat" data-toggle="modal" data-target="#editor-galeri"><span class="fas fa-edit"></span> Edit Album</button>
                    </div>
                </div>
                
            </div>
            <div class="col-md-8">
                <h2 class="title">{{$galeri->title}}</h2>
                <hr />
                <form action="{{route('Video-galeri.uploadvideo')}}" id="uploadvideo" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="judul">Title Video</label>
                                {{ csrf_field() }}
                                <input type="hidden" name="vidgal_id" value="{{$galeri->id}}">
                                <input type="text" name="judul" id="judul" placeholder="Title Video" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="file" name="file" accept=".mp4,.flv" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-block btn-outline-primary btn-flat"><span class="fas fa-upload"></span> Upload Video</button>
                        </div>
                    </div>
                </form>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                    </div>
                </div>
                <div id="feedback"></div>
                <div class="mb-3"></div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-body">
                        <div id="gallery-images">
                            <table class="table table-hover text-nowrap" id="tabel-list-video">
                                <thead>
                                    <tr>
                                        <th>Video Title</th>
                                        <th>File type</th>
                                        <th>File Size</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galeri->videos as $item)
                                        <tr>
                                            <td>{{$item->video_title}}</td>
                                            <td>{{$item->file_mime}}</td>
                                            <td>{{number_format(($item->file_size / 1000000), 2)}} Mb</td>
                                            <td>
                                                <form action="{{route('Video-galeri.deletevideos')}}" method="POST"  >
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="video_id" value="{{$item->id}}">
                                                    <button type="submit" class="float-right btn btn-danger" style="position:relative;">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal Edit --}}
<div class="modal fade" id="editor-galeri" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Galeri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('Video-galeri.update', $galeri->id)}}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Judul Galeri" value="{{$galeri->title}}">
                    </div>
                    <br />
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6">{{$galeri->deskripsi}}</textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footscript')
    <script src="{{asset('template/backend/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('template/backend/plugins/jquery/jquery.form.min.js')}}"></script>
    <script type="text/javascript">
        $('#editor-galeri').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var modal = $(this)
        });

        $(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
        $(document).ready(function(){

            $('#uploadvideo').ajaxForm({
                beforeSend:function(){
                    $('#feedback').empty();
                },
                uploadProgress:function (event, position, total, percentComplete){
                    $('.progress-bar').text(percentComplete + '%');
                    $('.progress-bar').css('width', percentComplete + '%'); 
                },
                success:function(data){
                    if (data.errors) {
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                        toastr["error"](data.errors, "Upload Gagal !")
                    }
                    if (data.success) {
                        $('.progress-bar').text('Data Berhasil Diupload');
                        $('.progress-bar').css('width', '100%');
                        toastr["success"](data.success, "Berhasil !");
                        setTimeout(function () { location.reload(1); }, 2000);
                    }
                }   
            });   
        });
    </script>
@endsection