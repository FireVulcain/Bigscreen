<?php

namespace App\Http\Controllers;

use App\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question_type_a.*' => 'required',
            'question_type_b.*' => 'required|min:1|max:255',
            'question_type_c.*' => 'required|regex:/[1-5]/'
        ]);
        $user_id = Str::uuid()->toString();

        $datas = [];
        foreach ($request->question_type_a as $key => $value) {
            $datas[$key] = $value;
        }
        foreach ($request->question_type_b as $key => $value) {
            $datas[$key] = $value;
        }
        foreach ($request->question_type_c as $key => $value) {
            $datas[$key] = $value;
        }
        ksort($datas);
        
        foreach ($datas as $key => $value) {
            UserAnswer::create([
                'user_id' => $user_id,
                'survey_id' => $request->survey_id,
                'question_id' => $key,
                'answer' => $value
            ]);
        }
        

        return redirect('/')->with('message', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserAnswer  $userAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserAnswer  $userAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserAnswer  $userAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAnswer $userAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserAnswer  $userAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAnswer $userAnswer)
    {
        //
    }
}
