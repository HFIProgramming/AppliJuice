<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
    //
    protected $fillable = ['prompt', 'content'];

    public function tags()
    {
        return $this->belongsToMany(EssayTag::class, 'essaytag_essay', 'essay_id', 'essay_tag_id');
    }

    public function remarks()
    {
        return $this->morphMany(Remark::class, 'remarkable');
    }
}
