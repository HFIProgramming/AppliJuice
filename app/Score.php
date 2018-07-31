<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $fillable = ['test_id', 'test_name', 'applicant_id', 'section_scores', 'date', 'remark'];
}
