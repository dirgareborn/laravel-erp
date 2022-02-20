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
                    <span class="info-box-number">2,000</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-4">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">{{ __('adminlte::adminlte.total_expense') }}</span>
                    <span class="info-box-number">2,000</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-4">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">{{ __('adminlte::adminlte.total_profit') }}</span>
                    <span class="info-box-number">2,000</span>
                    </div>
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
                    <span class="text-bold text-lg">$18,230.00</span>
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
    @stop
    @push('js')
        @section('plugins.Chartjs', true)
    <script>
    $(function(){'use strict'
    var ticksStyle={fontColor:'#495057',fontStyle:'bold'}
    var mode='index'
    var intersect=true
    var $salesChart=$('#sales-chart')
    var salesChart=new Chart($salesChart,{type:'bar',data:{labels:['JUN','JUL','AUG','SEP','OCT','NOV','DEC'],datasets:[{backgroundColor:'#007bff',borderColor:'#007bff',data:[1000,2000,3000,2500,2700,2500,3000]},{backgroundColor:'#ced4da',borderColor:'#ced4da',data:[700,1700,2700,2000,1800,1500,2000]}]},options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,callback:function(value){if(value>=1000){value/=1000
    value+='k'}
    return '$'+value}},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})
    var $visitorsChart=$('#visitors-chart')
    var visitorsChart=new Chart($visitorsChart,{data:{labels:['18th','20th','22nd','24th','26th','28th','30th'],datasets:[{type:'line',data:[100,120,170,167,180,177,160],backgroundColor:'transparent',borderColor:'#007bff',pointBorderColor:'#007bff',pointBackgroundColor:'#007bff',fill:false},{type:'line',data:[60,80,70,67,80,77,100],backgroundColor:'tansparent',borderColor:'#ced4da',pointBorderColor:'#ced4da',pointBackgroundColor:'#ced4da',fill:false}]},options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,suggestedMax:200},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})})
    </script>
    @endpush
