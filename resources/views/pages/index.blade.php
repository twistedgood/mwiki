@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Pages</h2>
  <ul>
  @foreach ($pages as $page)
    <li>
      <a href="{{ route('pages.show', [$page->id]) }}">{{ $page->title }}</a> - {{ mb_substr($page->content, 0, 100) }}
    </li>
  @endforeach
  </ul>
<div>
@endsection