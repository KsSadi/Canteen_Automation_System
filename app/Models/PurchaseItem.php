<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(pCategory::class,'id','pcat_id');

    }

    public function unit()
    {
        return $this->hasOne(PurchaseUnit::class,'id','punit_id');

    }


}
