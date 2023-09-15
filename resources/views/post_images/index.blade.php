@extends('layout.common')
@section('title', '投稿一覧')
@section('content')
<div>
  <form action='/post_images' method="GET">
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
  </form>
</div>
@include('post_images.list', ['post_image' => $post_images])
@endsection