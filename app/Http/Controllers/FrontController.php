<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionAnswer;

class FrontController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $questionsAnswers = QuestionAnswer::all();

        return view('front.index', ['questions' => $questions, 'questionsAnswers' => $questionsAnswers]);
    }
}
