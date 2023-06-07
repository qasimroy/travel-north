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

    const CITIES = [
        'Karachi',
        'Lahore',
        'Islamabad',
        'Rawalpindi',
        'Faisalabad',
        'Peshawar',
        'Gujranwala',
        'Gilgit',
        'Skardu',
        'Murree',
        'Abbottabad',
        'Naran',
        'Kaghan',
        'Swat',
        'Chitral',
        'Hunza',
        'Sawat',
        'Baltistan',
        'Muzaffarabad',
        'Neelum Valley',
        'Shogran',
        'Ghizer',
        'Astore',
        'Hunza Valley',
        'Khunjerab Pass',
        'Naltar Valley',
        'Fairy Meadows',
    ];

    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function serviceProviderService()
    {
        return $this->belongsTo(ServiceProviderServices::class, 'service_provider_service_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
