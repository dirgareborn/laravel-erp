@extends('adminlte::page')

@section('title', 'Kegiatan')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Kegiatan</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <h3 class="card-title"></h3>
            <div class="card-tools">
            <a href="{{ route('kegiatan.create')}}" class="btn btn-flat btn-info" > <i class="fa fa-plus"></i> Tambah Kegiatan</a>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            @php
                $heads = [
                    ['label' => 'No', 'width' => 5],
                    'Judul',
                    ['label' => 'Yang Menghadiri', 'width' => 20],
                    ['label' => 'Status', 'width' => 10],
                    ['label' => 'Aksi', 'width' => 5],
                ];
                $config = [
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
                @endphp

                <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered with-buttons compressed>
                    @foreach($kegiatan as $key => $row)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $row['title']}}</td>
                            <td>{{ $row['attendants']}}</td>
                            <td>
                            @if ($row['is_active'] == 0)
                                <span class="badge badge-danger">Tidak Aktif</span>
                            @else
                                <span class="badge badge-success">Aktif</span>
                            @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('kegiatan.edit', $row['id'])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-fw fa-pen"></i></a>
                                    <a href="{{ route('kegiatan.show', $row['id'])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"><i class="fa fa-fw fa-eye"></i></a>                                    </a>
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