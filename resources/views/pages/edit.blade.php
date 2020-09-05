@extends('layouts.app')

@section('content')

<div class="container-fluid">
  @if (session('action_result'))
    <div class="alert alert-success">
      {{ session('action_result') }}
    </div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if ($page->id)
  <form method="POST" action="{{ route('pages.update', [$page->id]) }}">
    @method('PUT')
  @else
  <form method="POST" action="{{ route('pages.store') }}">
  @endif
    @csrf
    <input type="submit" class="btn btn-primary btn-sm" value="Save">
    <input type="text" class="form-control" name="title" value="{{ $page->title }}" size="100" placeholder="Title">
    <markdown-view raw-text="{{ $page->content }}" :editable="true"></markdown-view>
  </form>
<div>
@endsection
