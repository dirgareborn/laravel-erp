<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Carbon;
class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $invoices = Order::whereSort('sale')->index();
        return view("invoices.index", [ "invoices" => $invoices]);

    }

    public function revenue(){

        $revenues = Order::whereSort('sale')->index();
        return view("invoices.revenue", [ "revenues" => $revenues]);

    }

    public function create(){
        $customers = Customer::Active();
        $items = Item::all();
        return view("invoices.create", ["customers" => $customers, "items" => $items]);
    }

    public function getItem(Request $request){
        $product = Item::find($request->id);
        return response()->json($product);
    }

    public function store(Request $request){

        DB::beginTransaction();
        try{
            
            
            $order = $request->all();
            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->date = $request->date;
            $order->due_date = $request->due_date;
            $order->number = $request->number;
            $order->total = $request->grand_total;
            $order->save();

            $products = $request->input('products', []);
            $quantity = $request->input('quantity', []);
            for ($product=0; $product < count($products); $product++) {
                if ($products[$product] != '') {
                    $order->products()->attach(
                        $products[$product], 
                    ['quantity' => $quantity[$product]], 
                    ['purchase_price' => $request->purchase_price[$product]],
                    ['amount' => $request->amount[$product]]
                    );
                }
            }

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(["error" => $e->getMessage()]);
        }
        return redirect()->route("invoice.index");
    }

    public function edit($id){
        $invoice = Order::find($id);
        $customers = Customer::Active();
        $products = Item::all();
        return view("invoices.edit", ["invoice" => $invoice, "customers" => $customers, "products" => $products]);
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try{
            $input = $request->all();
            Order::update($input, $id);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(["error" => $e->getMessage()]);
        }
        return redirect()->route("invoice.index");
    }

    public function destroy($id){
        $item = Order::find($id);
        $item->delete();
        if($item){
            return response()->json(["success" => "Data Berhasil dihapus"]);
        }else{
            Abort(["error" => "Gagal"]);
        }
    }
}
