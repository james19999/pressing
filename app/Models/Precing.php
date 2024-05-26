<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Precing extends Model
{
    use HasFactory;
    protected $table = 'precings';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'logo',
    ];
}
