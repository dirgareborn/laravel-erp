@extends('adminlte::page')

@section('title', 'Produk')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{ __('adminlte::adminlte.products') }}</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">{{ __('adminlte::adminlte.products') }}</li>
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
            <a href="{{ route('product.create')}}" class="btn btn-rounded btn-xs btn-info" >{{ __('adminlte::adminlte.add_new') }}</a>
            </div>
            </div>
            <div class="card-body">

            @php
                $heads = [
                    ['label' => 'No', 'width' => 5],
                    'Name',
                    'Category',
                    'Sale Price',
                    'Purchase Price',
                    ['label' => 'Status', 'width' => 10],
                    ['label' => 'Aksi', 'no-export' => false, 'width' => 5],
                ];

                $config = [
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
                @endphp

                <x-adminlte-datatable id="table7" head-theme="bg-blue" :config="$config" :heads="$heads" striped hoverable bordered with-buttons compressed>
                    @foreach($products as $key => $row)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $row['name']}}</td>
                            <td>{{ $row->category->name }}</td>
                            <td>@currency($row['sale_price'])</td>
                            <td>@currency($row['purchase_price'])</td>
                            <td>
                            @if ($row['is_active'] == 0)
                                <span class="badge badge-danger">Disabled</span>
                            @else
                                <span class="badge badge-success">Enabled</span>
                            @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('product.edit', $row['id'])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-fw fa-pen"></i>
                                    </a>
                                    <a href="{{ route('product.show', $row['id'])}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
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
@include('assets._swalDeleteConfirm')
@endpush
