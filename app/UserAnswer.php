<?php

namespace Bigscreen;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'user_id', 'question_id', 'answer' ];
}
