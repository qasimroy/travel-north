<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    const ACCEPTED = 'accepted';
    const PENDING = 'pending';
    const REJECTED = 'rejected';
    const COMPLETED = 'completed';

    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(ServiceProviderServices::class, 'service_provider_service_id');
    }
}
