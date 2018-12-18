<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    protected $casts = [
//        'visibility' => 'array',
        'offers' => 'array'
    ];

    protected $fillable = ['first_name','last_name','gender','nationality','visibility'];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function essays()
    {
        return $this->hasMany(Essay::class);
    }
}
