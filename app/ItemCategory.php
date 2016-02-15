<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCategory extends Model
{

	/**
     * Enable the Soft Delete feature in the model.
     *
     * @var string
     */
    use SoftDeletes;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'item_categories';

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
    	'code',
		'name',
		'description'		
	];

    /**
     * Items assigned to this category.
     *
     * @var array
     */
	public function items()
	{
		return $this->hasMany('App\Item');
	}
}
