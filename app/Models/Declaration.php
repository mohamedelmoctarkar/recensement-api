<?php

namespace App\Models;
use App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ["data"];


	public function entities() 
	{
		return $this->hasMany(Entity::class);
	}
 
    
}
