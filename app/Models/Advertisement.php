<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $append = ['formatted_date', 'status'];

    public function getFormattedDateAttribute()
    {
        if ($this->show == false) {
            return getFormattedDate($this->created_at);
        } else {
            return getFormattedDate($this->updated_at);
        }        
    }

    public function getStatusAttribute()
    {
        if ($this->show == false) {
            return 'Non publié';
        } else {
            return 'Publié';
        }        
    }
}
