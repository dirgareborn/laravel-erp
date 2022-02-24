@extends('adminlte::page')

@section('title', 'Edit Pengurus')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Edit Pengurus DPD</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">Edit Pengurus DPD</li>
    </ol>
  </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pengurus.index')}}" class="btn btn-flat btn-info" > <i class="fa fa-tabel"></i> Daftar Pengurus</a>
            </div>
            <div class="card-body">
            @include('admin.pengurus.form_edit')
            </div>
        </div>
    </div>
</div>
@stop