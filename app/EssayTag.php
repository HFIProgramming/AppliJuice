<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EssayTag extends Model
{
    //
    protected $fillable = ['tag', 'type', 'type_text'];

    public function essays()
    {
        return $this->belongsToMany(Essay::class, 'essaytag_essay', 'essay_tag_id', 'essay_id');
    }
}
