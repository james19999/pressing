<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'garment_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function garment()
    {
        return $this->belongsTo(Garment::class,'garment_id');
    }
}
