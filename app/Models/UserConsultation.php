<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConsultation extends Model
{
    use HasFactory;

    protected $appends = ['user_name', 'consultation_name', 'formatted_date'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserNameAttribute()
    {
        return $this->user->name ?? 'Compte Supprimé';
    }

    public function getConsultationNameAttribute()
    {
        return $this->consultation->name ?? 'Supprimé';
    }

    public function getFormattedDateAttribute()
    {
        return getFormattedDate($this->created_at);
    }
}
