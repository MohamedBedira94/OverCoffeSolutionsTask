<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'id', 'category',
	];

	public function post(){

		return $this->hasMany('App\Post');
	}
}
