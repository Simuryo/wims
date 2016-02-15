<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'people';

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
        'employee_id',
		'patient_id',
		'last_name',
		'first_name',
		/*'middle_name',
		'birth_date',
		'gender',
		'civil_status',
		'house_no',
		'street',
		'barangay',
		'municipality',
		'province',
		'country',*/
    ];
}
