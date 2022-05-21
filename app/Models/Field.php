<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ["label", "validator", "initial_value", "type", "form_id"];
}
