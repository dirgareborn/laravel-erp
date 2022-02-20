@extends('adminlte::page')

@section('title', 'Detail Berita')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Detail Data Berita</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">Detail Berita </li>
    </ol>
  </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('berita.index')}}" class="btn btn-flat btn-info" > <i class="fa fa-table"></i> Daftar Berita</a>
            </div>
            <div class="card-body">
            <h3 class="card-title"> {{ $berita->title }}</h3> <br>
            <img class="img-responsive pad" src="{{ is_img($berita->image) }}" alt="foto" width="100%">
            <p class="text-muted">{!! $berita->description !!}</p>
            <p class="text-muted">Status : {{ is_active($berita->is_active)}} | {{ format_date($berita->created_at )}}</p>
            </div>
        </div>
    </div>
</div>

@stop