<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rol extends Model
{
    //
    public function users():  BelongsToMany
    {
        return $this->belongsToMany(User::class,'companies_roles_users');
    }
}
