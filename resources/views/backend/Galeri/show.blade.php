@extends('layouts.backend')

@section('headlink')
    <link rel="stylesheet" href="{{asset('template/backend/plugins/dropzone/min/dropzone.min.css')}}">
    <style>
        #gallery-images img{
            position: absolute;
            left: 50%;
            top: 50%;
            height: 100%;
            width: auto;
            -webkit-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
            z-index:0;
        }
        #gallery-images ul{
            margin:0;
            padding:0;
        }
        #gallery-images li{
            padding:0;
            list-style: none;
            float: left;
            margin-right: 10px;
            margin-bottom: 10px;
            position: relative;
            width: 150px;
            height: 150px;
            overflow: hidden;
            border: 2px solid #000;
            background:#ddd;
        }
    </style>
    @endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Deskripsi Album Foto</h3>
                    </div>
                    <div class="card-body">
                        <p>{{$galeri->deskripsi}}</p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-block btn-outline-success btn-flat" href="#" data-toggle="modal" data-target="#editor-galeri"><span class="far  fa-edit"></span> Edit</button>
                        <a class="btn btn-block btn-outline-info btn-flat" href="{{route('Galeri.indexb')}}"><span class="fas fa-arrow-circle-left"></span> Kembali</a>
                    </div>
                </div>
                
            </div>
            <div class="col-md-8">
                <h2 class="title">{{$galeri->title}}</h2>   
                <hr />
                <form action="{{route('Galeri.uploadimg')}}" class="dropzone" id="mydropzone" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="galeri_id" value="{{$galeri->id}}">
                </form> 
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-body">
                        <div id="gallery-images">
                            <ul>
                                @foreach ($galeri->images as $item)
                                    <li>
                                        <img src="{{asset('upload/galeri/'. $item->filename)}}">
                                        <form action="{{route('Galeri.delimg')}}" method="POST"  >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="gambar_id" value="{{$item->id}}">
                                            <input type="hidden" name="galeri_id" value="{{$item->galeri_id}}">
                                            <button type="submit" class="float-right badge bg-danger" style="position:relative;">Hapus</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="editor-galeri" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Galeri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('Galeri.update', $galeri->id)}}" method="post">
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
    <script type="text/javascript">
        Dropzone.options.mydropzone= {
            maxFileSize: 100,
            acceptedFiles: 'image/*',
            success:function(file, response){
                if(file.status = 'success'){
                    handleDropzoneFileUpload.handleSuccess(response);
                }else{
                    handleDropzoneFileUpload.handleError(response);
                }
            }
        };

        var handleDropzoneFileUpload = {
            handleError: function(response) {
                console.log(response);
            },
            handleSuccess: function(response){
                var gambarlist = $('#gallery-images ul');
                var gambarSrc = "{{asset('upload/galeri')}}/"+ response.filename+"";
                $(gambarlist).append('<li><img src="'+ gambarSrc +'" /><form action="{{route('Galeri.delimg')}}" method="POST"  >{{ csrf_field() }}<input type="hidden" name="gambar_id" value="'+ response.id +'"><input type="hidden" name="galeri_id" value="'+ response.galeri_id +'"><button type="submit" class="float-right badge bg-danger" style="position:relative;">Hapus</button></form></li>');
            }   
        };

        $('#editor-galeri').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var modal = $(this)
        })
    </script>
    
@endsection