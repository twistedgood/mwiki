@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Pages</h2>
  <table class="table table-sm table-striped">
    <thead>
      <tr>
        <th scope="col">Action</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Last Updated</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pages as $page)
        <tr>
          <td><a href="{{ route('pages.edit', [$page->id]) }}">Edit</td>
          <td><a href="{{ route('pages.show', [$page->id]) }}">{{ $page->title }}</td>
          <td>{{ mb_substr($page->content, 0, 80) }}</td>
          <td>{{ $page->updated_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
<div>
@endsection
