<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placeholder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'placeholders';

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
    
        'name',
	];
	
}
