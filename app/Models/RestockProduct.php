<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;

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

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
