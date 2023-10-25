<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $timestamps = true;
    protected $table = 'staff';
    protected $fillable = [
        'id', 'name','email','phone','address'
    ];
}
