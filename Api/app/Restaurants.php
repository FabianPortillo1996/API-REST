<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
	protected $fillable =[
		'id',
		'name',
		'description',
		'url_image',
		'create_at',
		'updated_at'
	];
}
