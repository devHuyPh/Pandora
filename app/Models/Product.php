<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'quantity',
        'base_price',
        'is_active',
        'is_hotdeal',
        'is_new',
        'is_showhome',
        'category_id',
    ];

    protected $attributes = [
        'is_active' => 0,
        'is_hotdeal' => 0,
        'is_new' => 0,
        'is_showhome' => 0,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Thêm phương thức này để lấy tất cả các thuộc tính của sản phẩm qua các biến thể
    public function attributes()
    {
        return $this->hasManyThrough(Attibute::class, AttributeValue::class, 'product_id', 'attribute_id', 'id', 'id');
    }
}
