<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    protected $fillable = [
        'fullname',
        'birthday',
        'email',
        'address',
        'gender',
        'phone',
        'mobile_phone',
        'role_id',
        'status',
        'admission_date',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
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
