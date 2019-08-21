<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Survey extends Model
{
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
