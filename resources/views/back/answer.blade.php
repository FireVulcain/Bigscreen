@extends('layouts.back')

@section('content')
    @forelse ($user_answers as $user_answer)
        <table class="table table-dark user_answer">
            <thead>
                <th width="5%">N°</th>
                <th width="65%">Question</th>
                <th width="30%">Réponses</th>
            </thead>
            @forelse ($questions as $question)
                <tr class="answers_list">
                    <td>{{$question->question_number}} </td>
                    <td>{{$question->question}}</td>
                    @foreach ($user_answer as $answer)
                        @if($answer->question_id === $question->question_number)
                            <td> {{$answer->answer}} </td>
                        @endif
                    @endforeach
                </tr>
            @empty
                <p>Pas de questions</p>
            @endforelse
        </table>
    @empty
        <p>Pas de réponses</p>
    @endforelse
@endsection