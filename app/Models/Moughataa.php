<?php

namespace App\Models;
use App\Models\Region;

use Illuminate\Database\Eloquent\Model;

class Moughataa extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ["name"];


	public function regions() 
	{
		return $this->hasMany(Region::class);
	}
 
    
}
