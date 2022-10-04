<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid', 'name', 'email', 'number', 'address', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [
        
    ];

    //relasi
    public function product() {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function getPhotoAttribute($value) {
        return url('storage/' . $value);
    }
}
