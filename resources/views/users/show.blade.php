@extends('layout.common')

@section('title', 'ユーザー詳細')
@section('content')
<div>
  <h3>{{ $user->name }}</h3>
  <img src="{{ asset('storage/images/'.$user->get_image()) }}">
  <p><a href="{{ '/user/edit/'.$user->id }}">プロフィール編集</a></p>
</div>

@include('post_images.list', ['post_image' => $post_images])
@endsection