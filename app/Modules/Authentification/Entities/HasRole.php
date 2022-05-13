<?php

namespace Modules\Authentification\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasRole extends Model
{
    use HasFactory;
    protected $table = "model_has_roles";
    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Authentification\Database\factories\HasRoleFactory::new();
    }
}
