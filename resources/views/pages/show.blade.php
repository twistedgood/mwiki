@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9">
      <h2><a href="{{ route('pages.edit', [$page->id]) }}">{{ $page->title }}</a></h2>
      <markdown-view raw-text="{{ $page->content }}" :editable="false"></markdown-view>
    </div>
    <div class="col-sm-3">
        @foreach ($pages as $page)
          <li>
            <a href="{{ route('pages.show', [$page->id]) }}">{{ $page->title }}</a>
          </li>
        @endforeach
    </div>
  <div>
<div>
@endsection
