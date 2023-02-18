<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'product_qty', 'total_price', 'status_checkout', 'created_at', 'update_at', 'status'];
    public function product()
    {
        return $this->BelongsTo('App\Models\Product');
    }
}
