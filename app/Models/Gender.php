<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
	public $timestamps = false;

	protected $table = 'genus';
	protected $fillable = ['name'];

	/**
	 * The book of which this genera is part
	 */
	public function books()
	{
		return $this->belongsToMany('App\Models\Book');
	}
}
