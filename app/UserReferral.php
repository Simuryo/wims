<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserReferral extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_referrals';

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
    
        'referral_id',
        'user_id',
        'placeholder_id',
        'is_read',
        'is_important',
        'receiver_id',
	];
}
