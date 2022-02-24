@extends('adminlte::page')

@section('title', 'Customer')
@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Customer</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">Customer</li>
    </ol>
  </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                <a href="{{ route('customer.create')}}" class="btn btn-rounded btn-xs btn-info" >{{ __('adminlte::adminlte.add_new') }}</a>
            </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            @php
                $heads = [
                    ['label' => 'No', 'width' => 5],
                    'Nama', 'No. Telp', 'Alamat', 'status',
                    ['label' => 'Aksi', 'width' => 5],
                ];
                @endphp
            <x-adminlte-datatable id="table2" :heads="$heads" striped hoverable bordered with-buttons compressed>
                        @foreach ($customers as $key => $row)
                    <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['phone'] }}</td>
                    <td>{{ $row['address'] }}</td>
                    <td>
                        @if ($row['is_active'] == 0)
                            <span class="badge badge-danger">Disabled</span>
                        @else
                            <span class="badge badge-success">Enabled</span>
                        @endif
                        </td>
                    <td>
                    <div class="btn-group">
                        <a href="{{ route('customer.show', $row['id']) }}" class="btn btn-sm btn-default text-primary mx-1 shadow"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('customer.edit', $row['id']) }}" class="btn btn-sm btn-default  text-teal mx-1 shadow"><i class="fa fa-edit"></i></a>
                        <x-adminlte-button onclick="deleteConfirmation({{$row->id}})" class="btn-default btn-sm text-danger mx-1 shadow" type="submit" label="" theme="danger" icon="fas  fa-trash"/>
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
@include('assets._swalDeleteConfirm')
@endpush
