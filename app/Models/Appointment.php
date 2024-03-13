<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static latest()
 */
class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'appointment',
        're_appointment',
        'notes',
    ];

    public function patient():BelongsTo
    {
        return  $this->belongsTo(Patient::class, 'patient_id');
    }
}
