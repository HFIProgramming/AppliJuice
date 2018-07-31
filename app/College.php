<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    protected $fillable = ['name'];

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
