@extends('layouts.app')

@section('content')
<div class="container">
  <h2>{{ $page->title }}</h2>
  <div>
    <a href="{{ route('page.list') }}">list</a>
    <a href="{{ route('page.new') }}">new</a>
    <a href="{{ route('page.edit', [$page->id]) }}">edit</a>
  </div>
  <hr>
  <markdown-view mdtext="{{ $page->content }}" :editable="false"></markdown-view>
<div>
@endsection
