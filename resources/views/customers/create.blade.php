@extends('adminlte::page')

@section('title', 'Tambah Customer')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Tambah Customer</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">Tambah Customer</li>
    </ol>
  </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <x-adminlte-input name="name" id="name" label="Customer Name" placeholder="Customer Name (Company)" fgroup-class="col-md-6 col-6"/>
                    <x-adminlte-input name="email" id="email" label="Email" placeholder="Email" fgroup-class="col-md-6 col-6"/>
                    <x-adminlte-input name="phone" id="phone" label="Phone" placeholder="Phone" fgroup-class="col-md-6 col-6"/>
                    <x-adminlte-input name="address" id="address" label="Address" placeholder="Address" fgroup-class="col-md-6 col-6"/>
                    @php
                    $config = [
                        "height" => "100",
                        "toolbar" => [
                            // [groupName, [list of button]]
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']],
                        ],
                    ]
                    @endphp
                    <x-adminlte-text-editor name="notes" label="Notes"
                    placeholder="Write some text..." :config="$config" fgroup-class="col-md-12 col-12"/>
                    <x-adminlte-input name="pic" id="pic" label="Personal In Charge" placeholder="Personal In Charge" fgroup-class="col-md-6 col-6"/>
                    <x-adminlte-input-switch  igroup-size="sm"  name="is_active" label="Enabled" data-on-text="YES" data-off-text="NO" data-on-color="success" data-off-color="danger" checked/>
                </div>
                            <button type="reset" class="btn btn-secondary">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('plugins.Sweetalert2', true)
@section('plugins.Pace', true)
@section('plugins.summernote', true)

@section('plugins.BootstrapSwitch', true)

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
