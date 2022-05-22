<?php

namespace App\Models;

use App\Models\Form;

use App\Models\Entity;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Modules\Authentification\Entities\User;

class Declaration extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['form_data', 'reference', 'status', 'period', 'entity_id', 'region_id', 'user_id', 'form_id'];

    public function form()
    {
        return $this->BelongsTo(Form::class);
    }

    public function entity()
    {
        return $this->BelongsTo(Entity::class);
    }
    public function region()
    {
        return $this->BelongsTo(Region::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
