<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'quantity',
        'discount',
        'max_user',
        'start_date',
        'end_date',
        
    ];
    public function orders()
    {
        return $this->hasMany(Oder::class);
    }
}
