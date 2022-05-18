<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Request|mixed $scat_id
 * @method static find(int $id)
 */
class SaleItem extends Model
{
    use HasFactory;

    public function category(){
        return $this-> hasOne(sCategory::class,'id','scat_id');
    }
    public function unit(){
        return $this -> hasOne(SaleUnit::class,'id','sunit_id');
    }

}

