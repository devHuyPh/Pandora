<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attibute extends Model
{
    use HasFactory;
    protected $table = 'attibutes';
    protected $fillable = [
        'name'
    ];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
