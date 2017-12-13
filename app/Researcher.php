<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function taughtSubjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
