<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = true;
    protected $table = 'transactions';
    protected $fillable = [
        'id', 'transaction_time','pay_amount','payment_type','tax',
        'change_amount','total_amount','payment_status','id_staff'
        ,'id_customers','id_outlets','id_merchants'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'id_merchants');
    }
    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlets');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customers');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff');
    }
}
