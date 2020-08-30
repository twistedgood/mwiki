@extends('layouts.app')

@section('content')
<div class="container">
  <h2><a href="{{ route('page.edit', [$page->id]) }}">{{ $page->title }}</a></h2>
  <markdown-view mdtext="{{ $page->content }}" :editable="false"></markdown-view>
<div>
@endsection
