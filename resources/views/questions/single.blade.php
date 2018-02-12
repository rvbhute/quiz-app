@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        View Question
                        <small><a href="/questions/{{ $question->id }}/edit">edit this question</a></small>
                    </div>

                    <div class="card-body">

                        <div>
                            Q. {{ $question->question }}<br>

                            <ul>
                                @foreach($question->answers as $a)
                                    <li>
                                        {{ $a }} @if($a == $question->correct_answer) (answer) @endif
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
