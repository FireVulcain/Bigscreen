<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = [ 'user_id', 'question_id', 'answer' ];
}
