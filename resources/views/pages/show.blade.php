@extends('layouts.app')

@section('content')
<div class="container">
  <h2><a href="{{ route('pages.edit', [$page->id]) }}">{{ $page->title }}</a></h2>
  <markdown-view raw-text="{{ $page->content }}" :editable="false"></markdown-view>
<div>
@endsection
