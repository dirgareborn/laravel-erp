@extends('adminlte::page')

@section('title', 'Kegiatan')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Detail Data Kegiatan</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">Detail Kegiatan </li>
    </ol>
  </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kegiatan.index')}}" class="btn btn-flat btn-info" > <i class="fa fa-table"></i> Daftar kegiatan</a>
            </div>
            <div class="card-body">
            <h3 class="card-title"> {{ $kegiatan->title}}</h3> <br>
            <img class="img-responsive pad" src="{{ is_img_event($kegiatan->image) }}" alt="foto" width="100%">
            <p class="text-muted">{!! $kegiatan->description !!}</p>
            <p class="text-muted">Status : {{ is_active($kegiatan->is_active)}} | {{ format_date($kegiatan->date )}}</p>
            </div>
        </div>
    </div>
</div>

@stop