<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'proof_of_payment', 'qty', 'phone_number', 'address', 'totalPrice', 'product_id', 'user_id'
    ];

            /**
     * Product
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

            /**
     * User
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
