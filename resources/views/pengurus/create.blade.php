@extends('adminlte::page')

@section('title', 'Tambah Pengurus')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Tambah Pengurus DPD</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">Tambah Pengurus DPD</li>
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
            @include('admin.pengurus.form_create')
            </div>
        </div>
    </div>
</div>
@stop
@section('plugins.Sweetalert2', true)
@push('js')
<script>
    $(document).ready(function() {

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function inputFieldsAreFilled() {
            // TODO: Check if all fields are filled and return true or false. If you detect
            // some field is not filled you can return false, otherwise you return true.
        }

        $('#btnOpenSaltC').click(function() {            

            /* Check if all input fields are filled */
            if (inputFieldsAreFilled()) {
                Toast.fire({
                    icon: 'success',
                    title: 'All fields are filled.'
               });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'You need to fill all required fields.'
                });    
            }
        });
    })
</script>
@endpush