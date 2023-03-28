<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_in extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product_in';
    public $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'product_id',
        'supplier_id',
        'qty',
        'date',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
