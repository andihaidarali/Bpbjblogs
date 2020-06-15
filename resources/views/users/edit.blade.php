@extends('layouts.backend')

@section('headlink')
    <link rel="stylesheet" href="{{asset('template/backend/plugins/dropzone/min/dropzone.min.css')}}">
    @endsection

@section('backend')
@if ($user->id != Auth::user()->id)
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 403</h2>

            <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! You Don't Have Permission to Access.</h3>
            <p>
                Maaf, Anda tidak memiliki otoritas untuk mengakses Halaman ini.
                Kamu bisa kembali ke halaman dashboard <a href="{{route('backend')}}">return to dashboard</a>
            </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
@endif
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                    @elseif($errors->has('password'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @elseif($message = Session::get('Success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('template/frontend/images/avatar-icon.png')}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>
                        <p class="text-muted text-center">{{$user->username}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item text-center">
                                <b>{{$user->email}}</b>
                            </li>
                        </ul>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item active"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Ganti Password</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">

                    <div class="tab-pane" id="password">
                        <form class="form-horizontal" method="post" action="{{route('user.password', $user)}}">
                            {{csrf_field()}}
                            {{ method_field('patch') }}
                            <div class="form-group row">
                                <label for="old_password" class="col-sm-4 col-form-label">Password Lama</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password">
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-4 col-sm-8">
                                <button type="submit" class="btn btn-danger">Ganti Password</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane active" id="settings">
                        <form class="form-horizontal" method="post" action="{{route('user.update', $user)}}">
                            {{csrf_field()}}
                            {{ method_field('patch') }}
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" id="nama" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" id="username" value="{{$user->username}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Update Profil</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
            </div>
    </div>
</section>
@endsection

@section('footscript')
    <script src="{{asset('template/backend/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('template/backend/plugins/jquery/jquery.form.min.js')}}"></script>
    <script type="text/javascript">
        
    </script>
@endsection