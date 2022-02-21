<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = [
        'name', 'email', 'phone', 'pic','address', 'notes','is_active'
    ];

    public function scopeIndex($query)
    {
        return $query->orderBy('id', 'desc')->paginate(10);
    }


}
