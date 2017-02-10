<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get the members for the school
     */
    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
