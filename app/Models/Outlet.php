<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    public $timestamps = true;
    protected $table = 'outlets';
    protected $fillable = [
        'id', 'name', 'id_merchants'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'id_merchants');
    }
}
