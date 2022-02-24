@extends('adminlte::page')

@section('title', 'Buat Bill')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>{{ __('adminlte::adminlte.bills') }}</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">{{ __('adminlte::adminlte.bills') }}</li>
    </ol>
  </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('bill.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="info-box bg-default">
                                    <span class="info-box-icon"><i class="far fa-user"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"></span>
                                        <span class="info-box-number">
                                            <x-adminlte-select id="vendor_id" label="Vendor" name="vendor_id" :selected="old('vendor_id')" required>
                                                @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                @endforeach
                                            </x-adminlte-select>
                                        </span>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                @php
                                $config = ["format" => "YYYY-MM-DD HH:mm:ss"];
                                @endphp
                                <x-adminlte-input-date name="date" :config="$config" label="Bill Date" placeholder="Choose a date..." required fgroup-class="col-md-6 col-6">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-default">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                                <x-adminlte-input id="number" name="number" label="Bill Number" :value="old('number')" required fgroup-class="col-md-6 col-6" />
                                <x-adminlte-input-date name="due_date" :config="$config" label="Due Date" placeholder="Choose a date..." required fgroup-class="col-md-6 col-6">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-gradient-default">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                                <x-adminlte-input id="order_number" name="order_number" label="Order Number" :value="old('order_number')" required fgroup-class="col-md-6 col-6" />
                            </div>
                        </div>
                    </div>
                    @include('invoices._items')
                    <br>
                    <div class="row no-print">
                        <div class="col-12">
                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Save
                        </button>
                        </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@section('plugins.Summernote', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)
@section('plugins.TempusDominusBs4', true)
@section('livewire', true)
@stop
@push('js')
<script>
  $(document).ready(function(){
    let row_number = {{ count(old('items', [''])) }};
    $("#add_row").click(function(e){
        e.preventDefault();
        let new_row_number = row_number - 1;
        $('#item' + row_number).html($('#item' + new_row_number).html()).find('td:first-child');
        $('#items_table').append('<tr id="item' + (row_number + 1) + '"></tr>');
        row_number++;
    });
    $("#delete_row").click(function(e){
        e.preventDefault();
        if(row_number > 1){
            $("#item" + (row_number - 1)).html('');
            row_number--;
        }
    });

    // dropdown onchange event
    $('#item').change(function(){
        let id = $(this).val();
        $.ajax({
            url: '{{ route('getItem') }}',
            type: 'GET',
            data: {
            id: id
            },
            success: function(data){
            $('#purchase_price').val(data.purchase_price);
            }
        });
    });

    // onchange event input number
    $('#quantity, #purchase_price').change(function(){
        let quantity = $('#quantity').val();
        let purchase_price = $('#purchase_price').val();
        let total = quantity * purchase_price;
        let tax = total * 0.1;
        let grand_total = total + tax;
        $('#total').val(total);
        $('#subtotal').val(total);
        $('#tax').val(tax);
        $('#grand_total').val(grand_total);
    });

    // onchange event input number
    $('#discount').change(function(){
        let total = $('#total').val();
        let discount = total * $('#discount').val() / 100;
        let tax = total * 0.1;
        let grand_total = total - discount + tax;
        $('#grand_total').val(grand_total);
    });

    // sum row total
});
</script>
@endpush
