@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Pages</h2>
  <div>
    <a href="{{ route('page.new') }}">new</a>
  </div>
  <ul>
  @foreach ($pages as $page)
    <li>
      <a href="{{ route('page.show', [$page->id]) }}">{{ $page->title }}</a> - {{ mb_substr($page->content, 1, 100) }}
    </li>
  @endforeach
  </ul>
<div>
@endsection
