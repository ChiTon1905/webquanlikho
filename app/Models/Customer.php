<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
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

}
