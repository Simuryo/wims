<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Referral extends Model
{

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'referrals';

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
        'user_id',
	    'category',
        'hospital_id',
        'reason',
        'patient_id', 
/*        'chief_complaint',
        'history',
        'exams_performed',
        'treatment_medication',
        'operation_performed',
        'diagnosis',
        'remarks',*/	
	];

	/**
     * A referral is created by a hospital user.
     *
     * @var Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function user()
	{
		return $this->belongsTo('App\User')
	}
}
