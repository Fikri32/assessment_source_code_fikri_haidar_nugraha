<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    public $timestamps = true;
    protected $table = 'merchants';
    protected $fillable = [
        'id', 'name'
    ];

    public function outlet()
    {
        return $this->hasOne(Outlet::class, 'id_merchants');
    }
}
