@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new Questionnaire</div>

                    <div class="card-body">
                        <form action="/questionnaires" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter Title" aria-describedby="titleHelp">
                                <small id="titleHelp" class="form-text text-muted">Give your questionnaire a title that attracts attention</small>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="purpose">Purpose</label>
                                <input class="form-control" type="text" name="purpose" id="purpose" placeholder="Enter Purpose" aria-describedby="purposeHelp">
                                <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase responses</small>
                                @error('purpose')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary">Create Questionnaire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
