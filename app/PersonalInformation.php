<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalInformation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personal_information';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    
        'id',
        'patient_id',
        'last_name',
        'first_name',
        'middle_name',
        'birth_date',
        'gender',
        'civil_status',
        'house_no',
        'street',
        'barangay',
        'municipality',
        'province',
    ];
}
