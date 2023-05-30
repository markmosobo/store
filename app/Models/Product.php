<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;
    protected $fillable =
    [
     'name',
     'category_id',
     'pieces',
     'size',
     'buying_price',
     'supplier_id',
     'created_by',
     'image'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
