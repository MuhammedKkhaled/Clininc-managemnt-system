<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

/**
 * @method static latest()
 */
class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'prescription',
    ];

    public function patient():BelongsTo
    {
        return $this->belongsTo(Patient::class , 'patient_id');
    }
}
