@extends('layouts/master')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <p>Merci de répondre à toutes les questions et de valider le formulaire en bas de page</p>
    <form action="{{route('userAnswer.store')}}" method="post">
        @csrf
        @forelse ($questions as $key => $question)

            <h2>Question {{$question->id}}/{{count($questions)}}</h2>
            <p>{{$question->question}}</p>

            @switch($question->question_type)
                @case("A")
                    <select name="question_type_a[{{$question->id}}]" id="question_answer_{{$question->id}}">
                        <option value="">Choisissez une option</option>
                        @forelse ($questionsAnswers as $questionsAnswer)
                            @if($questionsAnswer->question_id === $question->id)
                                <option value="{{$questionsAnswer->answers}}">{{$questionsAnswer->answers}}</option>
                            @endif
                        @empty
                            <option value="empty">Pas de valeurs</option>
                        @endforelse
                    </select>
                    @break

                @case("B")
                    <input type="text" required="required" name="question_type_b[{{$question->id}}]" id="question_answer_{{$question->id}}" maxlength="255">
                    @break

                @case("C")
                    <select name="question_type_c[{{$question->id}}]" id="question_answer_{{$question->id}}">
                        <option value="">Choisissez une option</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    @break

                @default
                    
            @endswitch
        @empty
            <p>Aucune question</p>
        @endforelse
        <br>
        <button type="submit" value="Finaliser">Finaliser</button>
    </form>
    
@endsection