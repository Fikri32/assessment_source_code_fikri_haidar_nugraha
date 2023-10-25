<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = true;
    protected $table = 'customers';
    protected $fillable = [
        'id', 'name','email','phone','address'
    ];
}
