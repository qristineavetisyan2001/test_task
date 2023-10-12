@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Story</h1>

        <form method="POST" action="{{ route('story.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Story</button>
        </form>
    </div>
@endsection
