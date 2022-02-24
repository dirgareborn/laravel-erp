<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datatable = Order::index();

        $data = DB::table('orders')
            ->select(DB::raw("SUM( ( CASE WHEN sort='sale' THEN total END ) ) AS total_sales"),
                DB::raw("SUM( ( CASE WHEN sort='purchase' THEN total END ) ) AS total_expences"))
            ->get();

        $month = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];

        $sales = DB::table('orders')
            ->select(DB::raw("SUM( ( CASE WHEN sort='sale' THEN total END ) ) AS total_sales"),
                DB::raw("SUM( ( CASE WHEN sort='purchase' THEN total END ) ) AS total_expences"))
            ->whereMonth('date', '=', date('m'))
            ->get();

        $sales_per_month = DB::table('orders')
            ->select(DB::raw("SUM( ( CASE WHEN sort='sale' THEN total END ) ) AS total_sales"),
                DB::raw("SUM( ( CASE WHEN sort='purchase' THEN total END ) ) AS total_expences"),
                DB::raw("MONTH(date) as month")
            )
            ->groupBy(DB::raw("MONTH(date)"))
            ->get();
        // dd($sales_per_month);
        $sales_per_month_data = array();
        $sales_per_month_data['labels'] = array_column(json_decode(json_encode($sales_per_month), true), 'month');
        $sales_per_month_data['datasets'][0]['label'] = 'Sales';
        $sales_per_month_data['datasets'][0]['backgroundColor'] = 'rgba(255, 99, 132, 0.2)';
        $sales_per_month_data['datasets'][0]['borderColor'] = 'rgba(255,99,132,1)';
        $sales_per_month_data['datasets'][0]['borderWidth'] = 1;
        $sales_per_month_data['datasets'][0]['data'] = array_column(json_decode(json_encode($sales_per_month), true), 'total_sales');

        $sales_per_month_data['datasets'][1]['label'] = 'Expenses';
        $sales_per_month_data['datasets'][1]['backgroundColor'] = 'rgba(54, 162, 235, 0.2)';
        $sales_per_month_data['datasets'][1]['borderColor'] = 'rgba(54, 162, 235, 1)';
        $sales_per_month_data['datasets'][1]['borderWidth'] = 1;
        $sales_per_month_data['datasets'][1]['data'] = array_column(json_decode(json_encode($sales_per_month), true), 'total_expences');

        $sales_per_month_data['datasets'][2]['label'] = 'Profit';
        $sales_per_month_data['datasets'][2]['backgroundColor'] = 'rgba(255, 159, 64, 0.2)';
        $sales_per_month_data['datasets'][2]['borderColor'] = 'rgba(255, 159, 64, 1)';
        $sales_per_month_data['datasets'][2]['borderWidth'] = 1;
        $sales_per_month_data['datasets'][2]['data'] = array_map(function($a, $b) { return $a - $b; }, $sales_per_month_data['datasets'][0]['data'], $sales_per_month_data['datasets'][1]['data']);

      
        $sale = $data[0]->total_sales;
        $expences = $data[0]->total_expences;
        $profit = $sale - $expences;
        
        return view('dashboard', compact('datatable','sale','expences','profit', 'sales', 'data','month','sales_per_month_data'));
        
    }
}