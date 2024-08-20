<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number', 'address', 'user_id', 'service_id'
    ];

            /**
     * Service
     *
     * @return void
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
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
