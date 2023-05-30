<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class RestockProduct extends Model
{
    use HasFactory;
    protected $fillable =
    [
     'product_id',
     'pieces',
     'buying_price',
     'supplier_id',
     'created_by',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
