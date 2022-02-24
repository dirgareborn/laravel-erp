<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Vendor;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Carbon;
class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $purchases = Order::whereSort('purchase')->index();
        return view("purchases.index", [ "purchases" => $purchases]);

    }

    public function revenue(){

        $revenues = Order::index();
        return view("purchases.revenue", [ "revenues" => $revenues]);

    }

    public function create(){
        $vendors = Vendor::Active();
        $items = Item::all();
        return view("purchases.create", ["vendors" => $vendors, "items" => $items]);
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
            $order->customer_id = $request->vendor_id;
            $order->date = $request->date;
            $order->due_date = $request->due_date;
            $order->number = $request->number;
            $order->total = $request->grand_total;
            $order->sort = 'purchase';
            $order->save();

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(["error" => $e->getMessage()]);
        }
        return redirect()->route("bill.index");
    }

    public function edit($id){
        $invoice = Order::find($id);
        $customers = Customer::Active();
        $products = Item::all();
        return view("purchases.edit", ["invoice" => $invoice, "customers" => $customers, "products" => $products]);
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
