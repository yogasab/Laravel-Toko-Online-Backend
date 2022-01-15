<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone_number',
        'address',
        'transaction_total',
        'transaction_status'
    ];

    protected $hidden = [];

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id');
    }

    // public function getRouteKeyName()
    // {
    //     return 'uuid';
    // }
}
