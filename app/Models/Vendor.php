<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';
    protected $fillable = [
        'name',
        'is_active'
    ];

    public function scopeIndex($query)
    {
        return $query->orderBy('id', 'desc')->paginate(10);
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', 1)->get();
    }
}
