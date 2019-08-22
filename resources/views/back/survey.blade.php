@extends('layouts.back')

@section('content')
    <table class="table table-dark">
        <thead>
            <tr>
                <th>N°</th>
                <th>Question</th>
                <th>Type</th>
            </tr>
        </thead>
        @forelse ($questions as $question)
            <tr>
                <td>
                    {{$question->question_number}}
                </td>
                <td>
                    {{$question->question}}
                </td>
                <td>
                    {{$question->question_type}}
                </td>
            </tr>
        @empty
            
        @endforelse
    </table>
    
@endsection