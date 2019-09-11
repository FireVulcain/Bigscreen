@extends('layouts/master')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {!! session()->get('success') !!}
        </div>
    @endif
    <section class="survey_section">
            <p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page</p>
            <form action="{{route('userAnswer.store')}}" method="post" id="survey-form">
                @csrf
                    
                @forelse ($questions as $key => $question)
                    <div class="questions_list">
                        <h2>Question {{$question->question_number}}/{{count($questions)}}</h2>
                        <label>{{$question->question}} *</label>
        
                        @switch($question->question_type)
                            @case("A")
                                <select name="question_type_a[{{$question->question_number}}]" id="question_answer_{{$question->question_number}}" @if($errors->has('question_type_a.'.$question->question_number)) class="alert-danger" @endif>
                                    <option value="">Choisissez une option</option>
                                    @foreach ($questionsAnswers as $id => $questionsAnswer)
                                        @if($questionsAnswer->question_id === $question->question_number)
                                            <option {{ old("question_type_a.$question->question_number") == $questionsAnswer->answers ? 'selected' : '' }} value="{{$questionsAnswer->answers}}">{{$questionsAnswer->answers}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('question_type_a.'.$question->question_number)) <span class="alert-danger">{{$errors->first('question_type_a.'.$question->question_number)}}</span>@endif
                                @break
        
                            @case("B")
                                @if($question->is_email)
                                    <input type="email" name="email[{{$question->question_number}}]" id="email_{{$question->question_number}}" required="required" value='{{old("email.$question->question_number")}}'>
                                    @if($errors->has('email.'.$question->question_number)) <span class="alert-danger">{{$errors->first('email.'.$question->question_number)}}</span>@endif
                                @else
                                    <input type="text" name="question_type_b[{{$question->question_number}}]" id="question_answer_{{$question->question_number}}" maxlength="255" required value='{{old("question_type_b.$question->question_number")}}'>
                                    @if($errors->has('question_type_b.'.$question->question_number)) <span class="alert-danger">{{$errors->first('question_type_b.'.$question->question_number)}}</span>@endif
                                @endif
        
                                @break
        
                            @case("C")
                                <select name="question_type_c[{{$question->question_number}}]" id="question_answer_{{$question->question_number}}" @if($errors->has('question_type_c.'.$question->question_number)) class="alert-danger" @endif>
                                    <option value="">Choisissez une option</option>
                                    <option value="1" {{ old("question_type_c.$question->question_number") == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old("question_type_c.$question->question_number") == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old("question_type_c.$question->question_number") == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old("question_type_c.$question->question_number") == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old("question_type_c.$question->question_number") == 5 ? 'selected' : '' }}>5</option>
                                </select>
                                @if($errors->has('question_type_c.'.$question->question_number)) <span class="alert-danger">{{$errors->first('question_type_c.'.$question->question_number)}}</span>@endif
                                @break
                            @default
                        @endswitch
                    </div>
                @empty
                    <p>Aucune question</p>
                @endforelse
                
                <button type="submit" class="btn" value="Finaliser">Finaliser</button>
            </form>
    </section>
    
@endsection