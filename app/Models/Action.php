<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Action extends Model
{
    protected $fillable = ['date', 'description', 'interval', 'user_id'];
    //
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
