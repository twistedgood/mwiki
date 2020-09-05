@extends('layouts.app')

@section('content')

<div class="container-fluid">
  @if ($page->id)
  <div class="float-right">
  <form method="POST" action="{{ route('pages.destroy', [$page->id]) }}">
    @method('DELETE')
    @csrf
    <input type="submit" class="btn btn-primary btn-sm" value="Delete" onclick="return confirm('Are you sure you want to delete?')">
  </form>
  </div>
  @endif
  @if ($page->id)
  <form method="POST" action="{{ route('pages.update', [$page->id]) }}">
    @method('PUT')
    @csrf
    <input type="submit" class="btn btn-primary btn-sm" value="Save">
    <input type="text" class="form-control" name="title" value="{{ $page->title }}" size="100" placeholder="Title">
    <markdown-view raw-text="{{ $page->content }}" :editable="true"></markdown-view>
  </form>
  @else
  <form method="POST" action="{{ route('pages.store') }}">
    @csrf
    <input type="submit" class="btn btn-primary btn-sm" value="Save">
    <input type="text" class="form-control" name="title" value="{{ $page->title }}" size="100" placeholder="Title">
    <markdown-view raw-text="{{ $page->content }}" :editable="true"></markdown-view>
  </form>
  @endif
<div>
@endsection
