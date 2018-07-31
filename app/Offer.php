<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $fillable = ['college_id'];

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
