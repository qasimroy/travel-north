<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    const OPEN = 'Open';
    const CLOSED = 'Closed';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function bookings()
    {
        return $this->hasMany(packageBooking::class, 'package_id');
    }
}
