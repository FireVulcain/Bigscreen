<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Question;

class QuestionTest extends TestCase
{
    public function test_have_20_questions()
    {
        $this->assertEquals(20, Question::count());
    }
}
