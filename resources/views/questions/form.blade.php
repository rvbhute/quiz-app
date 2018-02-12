@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Add a New Question</div>

                    <div class="card-body">

<form method="POST" action="/questions">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label for="inputQuestion">Question</label>
        <input type="text" class="form-control" id="inputQuestion" name="question" placeholder="Enter question"
               required value="{{ old('question') }}">
    </div>

    <div class="form-group">
        <label for="inputAnswers">Answers</label>
        <textarea class="form-control" id="inputAnswers" name="answers" rows="3" aria-describedby="answersHelp"
                  required>{{ old('answers') }}</textarea>
        <small id="answersHelp" class="form-text text-muted">Enter one answer on each line.</small>
    </div>

    <div class="form-group">
        <label for="inputCorrectAnswer">Correct Answer</label>
        <input type="text" class="form-control" id="inputCorrectAnswer" name="correct_answer"
               placeholder="Enter correct answer" required value="{{ old('correct_answer') }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
