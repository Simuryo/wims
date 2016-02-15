<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    /**
     * Enable the Soft Delete feature in the model.
     *
     * @var string
     */
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'code',
		'name',
		'category',
		'description',
		'uom',
		'reorder_point'
		
	];


    /**
     * The category that this item belongs.
     *
     * @var array
     */
    public function category()
    {
        return $this->hasOne('App\ItemCategory');
    }
}
