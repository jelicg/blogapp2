@extends('layout.default')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <small>Author{{$post->user->name }}</small>
@endsection
