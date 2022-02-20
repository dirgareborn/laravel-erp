@extends('adminlte::page')

@section('title', 'Berita')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Berita</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Berita</li>
    </ol>
  </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
            <a href="{{ route('berita.create')}}" class="btn btn-flat btn-info" > <i class="fa fa-plus"></i> Tambah Berita</a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            @php
                $heads = [
                    ['label' => 'No', 'width' => 5],
                    'Judul',
                    ['label' => 'Status', 'width' => 10],
                    ['label' => 'Aksi', 'no-export' => false, 'width' => 5],
                ];

                $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                  <i class="fa fa-lg fa-fw fa-trash"></i>
                              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                  <i class="fa fa-lg fa-fw fa-eye"></i>
                              </button>';

                $config = [
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
                @endphp

                <x-adminlte-datatable id="table7" head-theme="bg-blue" :config="$config" :heads="$heads" striped hoverable bordered with-buttons compressed>
                    @foreach($beritas as $key => $row)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $row['title']}}</td>
                            <td>
                            @if ($row['is_active'] == 0)
                                <span class="badge badge-danger">Tidak Aktif</span>
                            @else
                                <span class="badge badge-success">Aktif</span>
                            @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('berita.edit', $row['slug'])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-fw fa-pen"></i>
                                    </a>
                                    <a href="{{ route('berita.show', $row['slug'])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-fw fa-eye"></i></a>
                                        <x-adminlte-button onclick="deleteConfirmation({{$row['id']}})" class="btn-default btn-xs text-danger mx-1 shadow" type="submit" label="" theme="danger" icon="fas  fa-trash"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>
</div>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.Sweetalert2', true)
@stop
@push('js')
@include('admin.assets._swalDeleteConfirm')
@endpush