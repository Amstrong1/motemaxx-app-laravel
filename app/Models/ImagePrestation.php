<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImagePrestation extends Model
{
    use HasFactory;

    protected $table = 'image_prestations';

    protected $guarded = [];

    public function prestations() : BelongsTo
    {
        return $this->belongsTo(Prestation::class);
    }
}
