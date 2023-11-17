<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $append = ['user_name', 'formatted_date', 'prestation_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservationServices()
    {
        return $this->hasMany(ReservationService::class); 
    }

    public function hourReservations()
    {
        return $this->hasMany(HourReservation::class); 
    }

    public function getFormattedDateAttribute(){
        return getFormattedDate($this->date);
    }

    public function getUserNameAttribute(){
        return $this->user->name;
    }

    public function getPrestationNameAttribute(){
        return $this->prestation->name;
    }

}
