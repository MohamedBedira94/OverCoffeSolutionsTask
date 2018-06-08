<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'id','user_id', 'post_title', 'post_body','category_id',
	];

	public function user(){
		return $this->belongsTo('App\User','user_id');
	}
	public function category(){
		return $this->belongsTo('App\Category','category_id');
	}
}
