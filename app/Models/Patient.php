<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static latest()
 */
class Patient extends Model
{
    use HasFactory;
    const  GENDER_MALE = 2;
    const  GENDER_FEMALE = 1;

    protected $fillable =[
        'name',
        'age',
        'phone',
        'phone2',
        'gender',
    ];

    public function appointment():HasOne
    {
        return  $this->hasOne(Appointment::class);
    }

    public function diagnose():HasOne
    {
        return $this->hasOne(Diagnose::class);
    }

    public function prescription():HasOne
    {
        return  $this->hasOne(Prescription::class);
    }
}
