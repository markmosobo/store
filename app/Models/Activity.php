<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\MOdels\User;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = ['description','status','created_by'];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

}
