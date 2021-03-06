@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $questionnaire->title }}</h1>

                <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
                    @csrf

                    @foreach( $questionnaire->questions as $key => $question)
                        <div class="card mt-5">
                            <div class="card-header"><strong>{{ $key+1 }}. </strong>{{ $question->question }}</div>
                            <div class="card-body">
                                @error('responses.'.$key.'.answer_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <label for="answer{{ $answer->id }}">
                                            <li class="list-group-item">
                                                <input type="radio" name="responses[{{$key}}][answer_id]"
                                                       value="{{$answer->id}}"
                                                       {{ old('responses.' . $key . '.answer_id') == $answer->id ? 'checked' : '' }}
                                                       id="answer{{ $answer->id }}" class="mr-2"
                                                >
                                                {{ $answer->answer }}

                                                <input type="hidden" name="responses[{{$key}}][question_id]" value="{{ $question->id }}">
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    @endforeach

                <div class="card mt-4">
                    <div class="card-header">Your Information</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="survey[name]" id="name" placeholder="Enter Name" aria-describedby="nameHelp">
                            <small id="nameHelp" class="form-text text-muted">Hello whats your name?</small>
                            @error('survey.name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="survey[email]" id="email" placeholder="Enter Email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Your email please</small>
                            @error('survey.email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-secondary mt-3" type="submit">Submit Survey</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
