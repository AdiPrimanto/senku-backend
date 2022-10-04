<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'products_id', 'transactions_id'
    ];

    protected $hidden = [
        
    ];

    //relasi
    public function transaction() {
        return $this->hasMany(TransactionDetail::class, 'transactions_id');
    }
}
