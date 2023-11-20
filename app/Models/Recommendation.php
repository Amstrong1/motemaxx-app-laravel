<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $append = ['formatted_day'];

    public function getFormattedDayAttribute()
    {
        return $this->day + 1;
    }
}
