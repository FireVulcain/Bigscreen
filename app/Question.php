<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Survey;

class Question extends Model
{
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
