@extends('adminlte::page')

@section('title', 'Items')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{ __('adminlte::adminlte.items') }}</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">{{ __('adminlte::adminlte.items') }}</li>
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
            <a href="{{ route('item.create')}}" class="btn btn-rounded btn-xs btn-info" >{{ __('adminlte::adminlte.add_new') }}</a>
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
                <x-adminlte-datatable id="table1" head-theme="info" :heads="$heads" striped hoverable with-buttons compressed>
                    @forelse($items as $key => $row)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>
                                <img src="{{ is_img_thumb($row['image']) }}" alt="">
                                {{ $row['name']}}
                            </td>
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
                                    <a href="{{ route('item.edit', $row['id'])}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-fw fa-pen"></i>
                                    </a>
                                        <x-adminlte-button onclick="deleteConfirmation({{$row['id']}})" class="btn-default btn-xs text-danger mx-1 shadow" type="submit" label="" theme="danger" icon="fas  fa-trash"/>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <h4>{{ __('adminlte::adminlte.no_data') }}</h4>
                            </td>
                        </tr>
                    @endforelse
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
