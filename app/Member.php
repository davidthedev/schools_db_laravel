<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name', 'email', 'school_id'
    ];

    /**
     * Get the member for the school
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
