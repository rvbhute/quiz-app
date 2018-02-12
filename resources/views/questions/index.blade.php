@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        View All Questions
                        <small><a href="/questions/new">add a new question</a></small>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $q)
                                <tr>
                                    <td>{{ $q->question }}</td>
                                    <td>
                                        <a href="/questions/{{ $q->id }}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
