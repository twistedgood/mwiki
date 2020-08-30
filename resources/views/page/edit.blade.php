@extends('layouts.app')

@section('content')
<div class="container">
  <div>
    <a href="{{ route('page.list') }}">list</a>
  </div>
  <hr>
  @if ($page->id)
  <form method="POST" action="{{ route('page.put', [$page->id]) }}">
    @method('PUT')
  @else
  <form method="POST" action="{{ route('page.post') }}">
  @endif
    @csrf
    <div>
      <input type="text" name="title" value="{{ $page->title }}" size="100">
      <input type="submit" value="Save">
    </div>
    <markdown-view mdtext="{{ $page->content }}" :editable="true"></markdown-view>
  </form>
<div>
@endsection
