<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class App extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'apps';

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
     * The roles that belong to this App.
     */
    public function roles()
    {
        //return $this->belongsToMany('App\Role', 'app_roles', 'app_id', 'role_id');
        return $this->belongsToMany('App\Role');
    }


    /**
     * The users that belong to this App.
     */
    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\App_Role');
    }

}
