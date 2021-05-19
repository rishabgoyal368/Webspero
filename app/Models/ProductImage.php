<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_image';
    public function getImageAttribute($value)
    {
        return $value ? env('APP_URL') . '/' . $value : env('APP_URL') . '/image-not-found.jpg';
    }
}
