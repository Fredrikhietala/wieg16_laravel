<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Phone
 *
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class Phone extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
}
