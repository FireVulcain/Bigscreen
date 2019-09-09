@extends('layouts.back')

@section('content')
    <table class="table table-dark admin_questions_list">
        <thead>
            <tr>
                <th width="5%">N°</th>
                <th width="85%">Question</th>
                <th width="10%">Type</th>
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