@extends('layouts.layout')

@section('content')

    <h1 class="mt-5">Reviews</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="{{route('reviews.index')}}" class="nav-link active">Index</a>
            </li>
            <li class="nav-item">
                <a href="{{route('reviews.create')}}" class="nav-link">Create</a>
            </li>
        </ul>
    </nav>

    <table class="table .table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Username</th>
                <th scope="col">Body</th>
                <th scope="col">Rating</th>
                <th scope="col">Details</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td scope="row">{{$review->id}}</td>
                    <td>{{$review->title}}</td>
                    <td>{{$review->username}}</td>
                    <td>{{$review->body}}</td>
                    <td>{{$review->rating}}</td>
                    <td><a href="{{route('reviews.show', ['review' => $review->id])}}">Details</a></td>
                    <td><a href="{{route('reviews.edit', ['review' => $review->id])}}">Edit</a></td>
                    <td><a href="{{route('reviews.delete', ['review' => $review->id])}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
