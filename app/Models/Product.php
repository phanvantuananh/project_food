<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'product_name',
        'product_image',
        'product_price',
        'product_content',
        'product_quantity',
        'remember_token',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
