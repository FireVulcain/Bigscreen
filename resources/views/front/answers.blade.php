@extends('layouts/master')
@section('content')
    @forelse ($questions as $question)
        <div class="answers_list card">
            <h2>Question {{$question->question_number}}/{{count($questions)}}</h2>
            <p>{{$question->question}}</p>
            @forelse ($answers as $answer)
                @if($answer->question_id === $question->id)
                    <p>{{$answer->answer}}</p>
                @endif
            @empty
                <p>Pas de réponses</p>
            @endforelse
        </div>
    @empty
        <p>Pas de questions</p>
    @endforelse
@endsection