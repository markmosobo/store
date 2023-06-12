<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Category;

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
     'selling_price',
     'supplier_id',
     'created_by',
     'image'
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
