@extends('layouts.app')

@section('content')
<div class="container-fluid">
  @if ($page->id)
  <form method="POST" action="{{ route('page.put', [$page->id]) }}">
    @method('PUT')
  @else
  <form method="POST" action="{{ route('page.post') }}">
  @endif
    @csrf
    <input type="submit" class="btn btn-primary btn-sm" value="Save">
    <input type="text" class="form-control" name="title" value="{{ $page->title }}" size="100" placeholder="Title">
    <markdown-view markdown-text="{{ $page->content }}" :editable="true"></markdown-view>
  </form>
<div>
@endsection
