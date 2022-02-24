@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-4">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill-alt"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">{{ __('adminlte::adminlte.total_income') }}</span>
                    <span class="info-box-number">@currency($sale)</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-4">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">{{ __('adminlte::adminlte.total_expense') }}</span>
                    <span class="info-box-number">@currency($expences)</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-4">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">{{ __('adminlte::adminlte.total_profit') }}</span>
                    <span class="info-box-number">@currency($profit)</span>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
            <div class="row">
                <div class="card">
                    <table id="table1" class="table border cell-border" style="width:100%">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Date</th>
                                <th colspan="2">Income</th>
                                <th colspan="2">Expences</th>
                                <th rowspan="2">Saldo</th>
                            </tr>
                            <tr>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Vendor</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datatable as $key => $d)
                            <tr>

                                        <td> {{ $key+1 }}</td>
                                        <td> {{ format_date($d['date']) }}</td>
                                        <td>
                                            @if($d['sort'] == 'sale')
                                                {{ $d->customer->name }}
                                            @else - @endif
                                        </td>
                                        <td>
                                            @if($d['sort'] == 'sale')
                                                @currency($d->total)
                                            @else - @endif
                                        </td>
                                        <td>
                                            @if($d['sort'] == 'purchase')
                                                {{ $d->vendor->name }}
                                            @else - @endif
                                        </td>
                                        <td>
                                            @if($d['sort'] == 'purchase')
                                                @currency($d->total)
                                            @else - @endif
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th></th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>
            </div>
            </div>
            <div class="card">
                <div class="card-body">
                   <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                    <h3 class="card-title">{{ __('adminlte::adminlte.cash_flow') }}</h3>
                    <a href="javascript:void(0);">View Report</a>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="d-flex">
                    <p class="d-flex flex-column">
                    <span class="text-bold text-lg">@currency($sale)</span>
                    <span>Sales Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                    </p>
                    </div>

                    <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                    </span>
                    <span>
                    <i class="fas fa-square text-gray"></i> Last year
                    </span>
                    </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
    @stop
    @push('js')
        @section('plugins.Chartjs', true)
    <script>
        $(function () {
            var ctx = document.getElementById("sales-chart");
            var labels = JSON.parse('{!! json_encode($sales_per_month_data) !!}');
            var datasets = JSON.parse('{!! json_encode($sales_per_month_data) !!}');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels.labels,
                    datasets: datasets.datasets
                },
                options: {
                    scales: {
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            });
        });

    </script>
    @endpush
