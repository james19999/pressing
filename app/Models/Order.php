<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'status',
    'pressing_id' ,
    'payment_method',
    'type_lavage',
     'date_recived',
     'order_type',
     'remis',
     'total_remis',
     'total',
     'date_delivered',
     'order_number'

    ];
    protected $casts = [
        'type_lavage' => 'array',
    ];

    public function pressing(){
        return $this->belongsTo(Precing::class,'pressing_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
