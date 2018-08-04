<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    //
    public function remarkable()
    {
        return $this->morphTo();
    }
}
