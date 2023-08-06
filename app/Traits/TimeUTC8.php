<?php

namespace App\Traits;

use Carbon\Carbon;


Trait TimeUTC8
{
    public function setCreatedAtAttribute()
    {
        $this->attributes['created_at'] = waktuSekarang();
    }

    public function setUpdatedAtAttribute()
    {
        $this->attributes['updated_at'] = waktuSekarang();
    }
}