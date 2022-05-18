<?php

namespace App\Models;
use App\Models\Declaration;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ["name"];


	public function delecations() 
	{
		return $this->hasMany(Declaration::class);
	}
 
    
}
