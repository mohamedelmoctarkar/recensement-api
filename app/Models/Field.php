<?php

namespace App\Models;

use App\Models\Form;
use App\Models\Groupe;
use App\Models\Sous_groupe;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ["label", "validator", "initial_value", "type", "unite", "form_id", "added_for", "groupe_id", "sous_groupe_id"];

    public function form()
    {
        return
            $this->belongsTo(Form::class);
    }
    public function groupe()
    {
        return
            $this->belongsTo(Groupe::class);
    }

    public function sousGroupe()
    {
        return
            $this->belongsTo(Sous_groupe::class);
    }
}
