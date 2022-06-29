@extends('layouts.admin')


@section('content')

    <h1>{{$post->title}}</h1>
    <h2>{{$post->category->name}}</h2>
    <small>{{$post->created_at}}</small>
    <p>{{$post->content}}</p>
    <h5>pubblicato:{{$post->published}}</h5>

@endsection