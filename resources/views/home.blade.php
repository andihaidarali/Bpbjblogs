@extends('layouts.backend')

@section('backend')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$blog}}</h3>
                        <p>Berita</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-copy"></i>
                    </div>
                        <a href="{{route('Blog.index')}}" class="small-box-footer">
                        Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$produk->count()}}</h3>
                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$galeri->count()}}</h3>
                        <p>Album Foto</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$video}}</h3>
                        <p>Album Video</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('template/frontend/images/avatar-icon.png')}}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                        <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b><a class="float-right">{{ Auth::user()->username }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Edit Profile</b> <a class="float-right" href="{{route('user.edit', Auth::user()->id)}}"><span class="far fa-edit"></span></a>
                            </li>
                        </ul>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-flat btn-outline-danger btn-block"><b>Logout</b> <span class="fa fa-sign-out-alt"></span></a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-9">
            <!-- Default box -->
            <div class="card card-outline card-danger">
                <div class="card-header">
                <h3 class="card-title">Kilas Informasi</h3>
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
                            @foreach ($kilas as $item)
                                <tr>
                                    <td>{{date('d, M Y | H:i', strtotime($item->created_at))}}</td>
                                    <td>{{$item->title}}</td>
                                    <td class="align-right">
                                        <form action="{{route('Blog.destroy', $item->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="cat" value='1' >
                                            <a class="btn btn-xs btn-outline-success" href="{{route('kilas.edit', $item->id)}}">edit</a>
                                            <button class="btn btn-xs btn-outline-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$kilas->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title">Agenda</h3>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        @foreach ($agenda as $item)
                            <div>
                                @if ($item->status == 0 )
                                    <i class="fas fa-calendar-alt bg-info"></i>
                                @else
                                    <i class="fas fa-calendar-check bg-success"></i>
                                @endif
                                <div class="timeline-item">
                                <span class="time">
                                    <i class="fas fa-clock"></i> 
                                    {{date('H:i', strtotime($item->jadwal))}} WITA
                                </span>
                                <h3 class="timeline-header">{{date('d, F Y', strtotime($item->created_at))}}</h3>

                                <div class="timeline-body">
                                    <strong>{{$item->Nama_agenda}}</strong>
                                    @if ($item->status == 1)
                                        <span class="badge bg-xs bg-success float-right">Selesai</span>
                                    @endif  
                                    <hr />
                                    {{$item->deskripsi}}
                                </div>
                                <div class="timeline-footer">
                                    <form action="{{route('Agenda.setstatus', $item->id)}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        @if ($item->status == 0)
                                            <button class="btn btn-sm btn-primary" type="submit">Tandai Selesai</button>
                                        @endif
                                    </form>
                                </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                        @endforeach
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
