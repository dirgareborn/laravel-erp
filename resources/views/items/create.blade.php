@extends('adminlte::page')

@section('title', 'Tambah Item')

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
            <div class="card-body">
                <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <x-adminlte-input name="name" id="name" label="Item Name" placeholder="Item Name" fgroup-class="col-md-6 col-6"/>
                    <x-adminlte-input type="number" name="tax" id="tax" label="Tax" placeholder="Tax %" fgroup-class="col-md-6 col-6"/>
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
                    <x-adminlte-text-editor name="description" label="Deskripsi"
                    placeholder="Write some text..." :config="$config" fgroup-class="col-md-12 col-12"/>
                    <x-adminlte-input type="number" name="sale_price" id="sale_price" label="Sale Price" placeholder="Price" fgroup-class="col-md-6 col-6"/>
                    <x-adminlte-input type="number" name="purchase_price" id="purchase_price" label="Purchase Price" placeholder="Price" fgroup-class="col-md-6 col-6"/>
                    <x-adminlte-select id="category_id" name="category_id" label="categories"
                            fgroup-class="col-md-6 col-6">
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{__($cat->name)}}</option>
                        @endforeach
                    </x-adminlte-select>
                    <x-adminlte-input-file name="image" id="image" label="Picture" fgroup-class="col-md-6 col-6"/>
                    <x-adminlte-input-switch  igroup-size="sm"  name="is_active" label="Enabled" data-on-text="YES" data-off-text="NO" data-on-color="success" data-off-color="danger" checked/>
                </div>
                            <button type="reset" class="btn btn-secondary">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@section('plugins.Summernote', true)
@section('plugins.BootstrapSwitch', true)
@section('plugins.BsCustomFileInput', true)
@stop
