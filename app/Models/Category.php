<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categories';
    public $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'name',
    ];
}
