<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'photo', 'is_default'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function getPhotoAtttribute($value)
    {
        return url('storage/' . $value);
    }
}
