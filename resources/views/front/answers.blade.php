@extends('layouts/master')
@section('content')
    <div class="answer_time">
        <p>
            Vous trouverez ci-dessous les réponses que vous avez apportées à <br>
            notre sondage le {{$formatDate}}
        </p>
    </div>
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