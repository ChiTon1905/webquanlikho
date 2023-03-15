<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'products';
    public $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'price',
        'image',
        'qty',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
