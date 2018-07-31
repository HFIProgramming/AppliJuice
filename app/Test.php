<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $casts = [
        'sections' => 'array',
        'required_sections' => 'array'
    ];

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
