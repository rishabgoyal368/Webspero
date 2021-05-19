<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'qty', 
        'product_id',
    ];
   

    public static function store($data)
    {
       return Cart::updateOrCreate(
            [
                'user_id' => $data['user_id'],
                'product_id' => $data['product_id'],
            ],
            [
                'qty' => $data['qty'],
            ]
        );
    }

    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
