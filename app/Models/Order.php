<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'number',
        'date',
        'due_date',
        'amount',
        'discount',
        'notes',
        'status_id'
    ];

    protected function scopeIndex($query){
        return $query->orderBy('id', 'desc')->paginate(10);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    
    public function vendor(){
        return $this->belongsTo(Vendor::class, 'customer_id','id');
    }
    
    public function items(){
        return $this->hasMany(Sale_Item::class);
    }

    public function item(){
        return $this->belongsToMany(Item::class, 'order_items', 'order_id', 'item_id');
    }
}
