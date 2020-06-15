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
                <form action="{{route('Agenda.update', $agenda->id)}}" method="post">
                    <div class="card card-outline card-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nama_agenda">Nama Agenda</label>
                                        <input type="text" name="nama_agenda" class="form-control" id="" value="{{$agenda->Nama_agenda}}">
                                    </div>
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        {{ method_field('patch') }}
                                        <label for="jadwal">Jadwal Agenda</label>
                                        <input type="text" name="jadwal" class="form-control" id="jadwal" value="{{$agenda->jadwal}}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Status Agenda</label>
                                        <br />
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0"
                                                @if ($agenda->status == 0)
                                                    checked
                                                @endif
                                            >
                                            <label class="form-check-label" for="inlineRadio1">Belum Selesai</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1"
                                                @if ($agenda->status == 1)
                                                    checked
                                                @endif
                                            >
                                            <label class="form-check-label" for="inlineRadio2">Selesai</label>
                                        </div>
                                    </div>
                                    <div class="mb-3"></div>
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="{{route('Agenda.index')}}" class="btn btn-block btn-outline-secondary btn-flat btn-sm"><span class="fas fa-arrow-circle-left"></span> Kembali</a>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block btn-flat btn-sm"><span class="far fa-edit"></span> Edit Agenda</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="" cols="30" placeholder="Deskripsi Agenda" rows="10">{{$agenda->deskripsi}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

