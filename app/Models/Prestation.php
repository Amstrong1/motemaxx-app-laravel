<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;

    protected $appends = ['status'];

    public function getStatusAttribute() {
        if ($this->show == false) {
            return 'Non publié';
        } else {
            return 'Publié';
        }
    }
}
