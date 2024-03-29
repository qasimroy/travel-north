<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packageBooking extends Model
{
    const ACCEPTED = 'accepted';
    const PENDING = 'pending';
    const REJECTED = 'rejected';
    const COMPLETED = 'completed';

    use HasFactory;

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
