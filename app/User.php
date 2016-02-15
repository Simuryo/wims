<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use DB;
use Auth;
use App\AppRole;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        'username', 
        'password', 
        'role'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * User have a Role
     *
     * @var Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function app()
    {
        //$app = AppRole::where('user_id', '=', Auth::user()->id)->first();
        //return $app;
        return $this->belongsToMany('App\App', 'app_role');
    }

    /**
     * User have a Role
     *
     * @var Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roles()
    {
        return $this->belongsToMany('App\AppRole');
        //return $this->belongsToMany('App\Role', 'app_roles', 'app_id', 'role_id');
    }

    public function created_referrals()
    {
        return $this->hasMany('App\UserReferral');
    }

    public function received_referrals()
    {
        return $this->belongsToMany('App\Referral', 'user_referrals', 'receiver_id', 'referral_id');
    }

}
