<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasOne(SaleItem::class,'id','name');

    }
}
