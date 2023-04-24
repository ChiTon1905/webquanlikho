<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'suppliers';
    public $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'name',
        'address',
        'email',
        'telepon',
    ];
    public function product(){
        return $this->hasMany(Product::class);
    }
}
