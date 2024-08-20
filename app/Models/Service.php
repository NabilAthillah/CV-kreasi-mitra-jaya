<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image'
    ];

            /**
     * Servie Transaction
     *
     * @return void
     */
    public function productTransaction()
    {
        return $this->hasMany(ServiceTransaction::class);
    }
}
