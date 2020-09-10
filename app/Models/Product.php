<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const CURRENCY='$';
    protected $table='products';
    protected $fillable=['name','price','company','amount'];
    public function price(){
        return $this->price.' '.self::CURRENCY;
    }
}
