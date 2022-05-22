<?php

namespace App\Models;

use App\Models\Field;
use App\Models\Entity;
use App\Models\Groupe;
use App\Models\Sous_groupe;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ["name", "entity_id"];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function fileds()
    {
        return
            $this->hasMany(Field::class);
    }
    public function groupes()
    {
        return
            $this->hasMany(Groupe::class);
    }
}
