<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
        'name',
	];

    /**
     * The Apps that have this role.
     */
	public function apps()
    {
        //return $this->belongsToMany('App\App', 'app_roles', 'role_id', 'app_id');
        return $this->belongsToMany('App\App');
    }

    /**
     * The Users that have this role.
     */
    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\App_Role');
    }

}
