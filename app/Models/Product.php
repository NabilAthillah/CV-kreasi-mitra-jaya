<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'stock', 'image', 'description', 'category_id'
    ];

            /**
     * Category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

            /**
     * Product Transaction
     *
     * @return void
     */
    public function productTransaction()
    {
        return $this->hasMany(ProductTransaction::class);
    }
}
