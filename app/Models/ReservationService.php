<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    use HasFactory;

    protected $table = 'reservation_services';

    public function reservation()
    {
        return $this->belongsTo(Reservation::class); 
    }

    public function prestation()
    {
        return $this->belongsTo(Prestation::class); 
    }
}
