@extends('adminlte::page')

@section('title', 'Kategori')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Kategori</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Kategori</li>
    </ol>
  </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-8 col-sm-8 col-xs-12">
        <div class="card">
            <div class="card-body">
            @php
                $heads = [
                    ['label' => 'No', 'width' => 5],
                    'Nama Kategori',
                    ['label' => 'Jenis Kategori', 'width' => 20],
                    ['label' => 'Aksi', 'width' => 5],
                ];
                $config = [
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
                @endphp
                <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable bordered with-buttons compressed>
                    @foreach($categories as $key => $row)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $row['nama']}}</td>
                            <td>
                           @if($row['sort'] == 1)
                                <span class="badge badge-success">Berita</span>
                            @else
                                <span class="badge badge-info">Kegiatan</span>
                            @endif
                            
                            </td>
                            <td>
                                <div class="btn-group">
                                <x-adminlte-button class="btn-default btn-xs text-gray mx-1 shadow" data-toggle="modal" id="editButton" data-id="{{ $row['id'] }}" data-target="#editModal"
                                        data-attr="{{ route('kategori.edit', $row['id']) }}" type="submit" label="" theme="warning" icon="fas fa-edit text-gray-300"/>
                                <x-adminlte-button onclick="deleteConfirmation({{$row['id']}})" class="btn-default btn-xs text-danger mx-1 shadow" type="submit" label="" theme="danger" icon="fas  fa-trash"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>
    @include('admin.kategori.create')
    @include('admin.kategori.edit')
</div>
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('plugins.Sweetalert2', true)
@stop
@push('js')
@include('admin.assets._swalDeleteConfirm')
@include('admin.assets._swalStoreConfirm')
<script> 
$(document).on("click", "#editButton", function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let url = $(this).data('attr');
    $.ajax({
        url: url,
        type: "GET",
        data: { id: id },
        dataType: "JSON",
        success: function(data) {
            $('#editModal #id2').val(data.data.id);
            $('#editModal #nama2').val(data.data.nama);
            $('#editModal #sort2').val(data.data.sort);
            $('#editModal').modal('show');
        },
        error: function(data) {
            console.log('Error data');
        }
    });
});

$("#form-edit").submit( function(e) {
    e.preventDefault();
    let id = $('#id2').val();
    let nama = $('#nama2').val();
    let sort = $('#sort2').val();
    let _url = '/admin/kategori/'+id;
    let _token   = '{{ csrf_token() }}';
    $.ajax({
        url: _url,
        type:'PUT',
        data: {
            id:id,
            nama: nama,
            sort: sort,
            _token: _token
        },
        success: function (response) {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error")
        }
    });
});
</script>
@endpush