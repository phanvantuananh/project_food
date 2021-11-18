<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_status',
        'order_user',
        'order_email',
        'order_phone',
        'order_address',
        'order_total',
        'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
