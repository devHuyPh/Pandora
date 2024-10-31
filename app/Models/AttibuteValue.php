<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttibuteValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function attribute()
    {
        return $this->belongsTo(Attibute::class);
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'variant_attribute_values');
    }
}
