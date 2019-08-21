@extends('layouts/master')
@section('content')
    @forelse ($questions as $question)
        <div class="answers_list">
            <h2>Question {{$question->id}}/{{count($questions)}}</h2>
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