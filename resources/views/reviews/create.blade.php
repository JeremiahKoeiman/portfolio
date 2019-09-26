@extends('layouts.layout')

@section('content')

    <h1 class="mt-5">Reviews</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="{{route('reviews.index')}}" class="nav-link">Index</a>
            </li>
            <li class="nav-item">
                <a href="{{route('reviews.create')}}" class="nav-link active">Create</a>
            </li>
        </ul>
    </nav>

    <form action="/laravel60/public/reviews" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Review Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="reviewTitleHelp" placeholder="Enter review title">
        </div>

        <div class="form-group">
            <label for="username">Username<label>
            <input type="text" name="username" class="form-control" id="username" aria-describedby="UsernameHelp" placeholder="Enter username">
        </div>

        <div class="form-group">
            <label for="body">Body<label>
            <textarea class="form-control" name="body" id="body" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" step="0.5" placeholder="1" pattern="[0-5]" min="0" max="5" name="rating" class="form-control" id="rating" aria-describedby="ratingHelp" placeholder="Enter rating">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
