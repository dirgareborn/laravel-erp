@extends('adminlte::page')

@section('title', 'Tambah Kegiatan')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Tambah Kegiatan</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Kegiatan</li>
    </ol>
</div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kegiatan.index')}}" class="btn btn-flat btn-info" > <i class="fa fa-tabel"></i> Daftar Kegiatan</a>
            </div>
            <div class="card-body">
                <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <x-adminlte-input name="title" id="title" label="Nama Kegiatan" placeholder="placeholder" fgroup-class="col-md-12 col-12"/>
                    <x-adminlte-select2 id="kategori_id" name="kategori_id" label="Kategori"
                                     fgroup-class="col-md-6 col-6">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-red">
                                            <i class="fas fa-list"></i>
                                        </div>
                                    </x-slot>
                                    @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{$cat->nama}}</option>
                                    @endforeach
                                </x-adminlte-select2>
                        <x-adminlte-input name="attendants" id="attendants" label="Yang Menghadiri" placeholder="Yang Menghadiri" fgroup-class="col-md-6 col-6"/>
                        <x-adminlte-input-file name="image" id="image" label="Banner Kegiatan" fgroup-class="col-md-6 col-6">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-red">
                                    <i class="fa fa-image"></i>
                                </div>
                            </x-slot>
                            </x-adminlte-input-file>
                        <x-adminlte-input name="location" id="location" label="Lokasi Kegiatan" placeholder="Lokasi Kegiatan" fgroup-class="col-md-6 col-6"/>
                        @php
                        $config = [
                            "singleDatePicker" => true,
                            "showDropdowns" => true,
                            "startDate" => "js:moment()",
                            "minYear" => 2000,
                            "maxYear" => "js:parseInt(moment().format('YYYY'),10)",
                            "timePicker" => true,
                            "timePicker24Hour" => true,
                            "timePickerSeconds" => true,
                            "cancelButtonClasses" => "btn-danger",
                            "locale" => ["format" => "YYYY-MM-DD HH:mm:ss"],
                        ];
                        @endphp
                        <x-adminlte-date-range name="date" label="Tanggal Pelaksanaan Kegiatan" :config="$config"  fgroup-class="col-md-6 col-6">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-dark">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-date-range>
                            <x-adminlte-select2 label="Status" name="is_active" fgroup-class="col-md-6 col-6">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </x-adminlte-select2> 
                            @php
                            $config = [
                                "height" => "100",
                                "toolbar" => [
                                    // [groupName, [list of button]]
                                    ['style', ['bold', 'italic', 'underline', 'clear']],
                                    ['font', ['strikethrough', 'superscript', 'subscript']],
                                    ['fontsize', ['fontsize']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['height', ['height']],
                                    ['table', ['table']],
                                    ['insert', ['link', 'picture', 'video']],
                                    ['view', ['fullscreen', 'codeview', 'help']],
                                ],
                            ]
                            @endphp
                            <x-adminlte-text-editor name="description" label="Deskripsi" 
                                placeholder="Write some text..." :config="$config" fgroup-class="col-md-12 col-12"/>
                            
                            </div>
                            <button type="button" class="btn btn-secondary">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button> 
                    </form>
            </div>
        </div>
    </div>
</div>
@section('plugins.Summernote', true)
@section('plugins.DateRangePicker', true)
@stop