<?php

namespace Bigscreen\Http\Controllers;

use Illuminate\Http\Request;
use Bigscreen\Question;
use Bigscreen\QuestionAnswer;

class FrontController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $questionsAnswers = QuestionAnswer::all();

        return view('front.index', ['questions' => $questions, 'questionsAnswers' => $questionsAnswers]);
    }
}
