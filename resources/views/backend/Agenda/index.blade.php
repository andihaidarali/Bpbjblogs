@extends('layouts.backend')

@section('headlink')
    <link rel="stylesheet" href="{{asset('template/backend/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('template/backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('backend')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{route('Agenda.store')}}" method="post">
                    <div class="card card-outline card-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nama_agenda">Nama Agenda</label>
                                        <input type="text" name="nama_agenda" class="form-control" id="" placeholder="Nama Agenda">
                                    </div>
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <label for="jadwal">Jadwal Agenda</label>
                                        <input type="text" name="jadwal" class="form-control" id="jadwal" >
                                    </div>
                                    <div class="mb-5">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-success btn-block btn-flat"><span class="fas fa-calendar-plus"></span> Buat Agenda</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="" cols="30" placeholder="Deskripsi Agenda" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Agenda Terbaru</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Jadwal</th>
                                <th>Nama Agenda</th>
                                <th>Status</th>
                                <th class="text-right" style="width:120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agenda as $item)
                                <tr>
                                    <td>{{date('d/M/Y', strtotime($item->jadwal))}} <br /> {{date('H:i', strtotime($item->jadwal))}} WITA</td>
                                    <td>{{$item->Nama_agenda}}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-info">Selesai</span>
                                        @else 
                                            <span class="badge bg-warning">Belum</span>
                                        @endif
                                    </td>
                                    <td class="float-right">
                                        <form action="{{route('Agenda.destroy', $item->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a class="btn btn-xs btn-outline-success" href="{{route('Agenda.edit', $item->id)}}">edit</a>
                                            <button class="btn btn-xs btn-outline-danger" type="submit">Hapus</button>
                                        </form>
                                        <div class="mb-2"></div>
                                        <form action="{{route('Agenda.setstatus', $item->id)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            @if ($item->status == 0)
                                                <button class="btn btn-xs btn-primary" type="submit">Tandai Selesai</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        {{$agenda->links()}}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footscript')
<script type="text/javascript" src="{{asset('template/backend/plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('template/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script type="text/javascript">
    $('#jadwal').daterangepicker({
        "singleDatePicker": true,
        "showDropdowns": true,
        "minYear": 2019,
        "maxYear": 2040,
        "timePicker": true,
        "timePicker24Hour": true,
        "timePickerIncrement": 15,
        "autoApply": true,
        "locale": {
            "format": "YYYY-MM-DD hh:mm",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "Dari",
            "toLabel": "Ke",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Min",
                "Sen",
                "Sel",
                "Rab",
                "Kam",
                "Jum",
                "Sab"
            ],
            "monthNames": [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember"
            ],
            "firstDay": 1
        },
        "showCustomRangeLabel": false,
        "alwaysShowCalendars": true,
        "parentEl": "form-group",
        "opens": "center"
    }, function(start, end, label) {
    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });
</script>
@endsection

