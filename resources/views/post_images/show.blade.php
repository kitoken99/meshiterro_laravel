@extends('layout.common')

@section('title', '投稿')
@include('layout.header')
@section('content')
<div>
  <img src="{{ asset('storage/images/'.$post_image->get_image()) }}">
  <p>ショップ名：{{$post_image->shop_name}}</p>
  <p>説明：{{$post_image->caption}}</p>
  <p>投稿ユーザー画像：<img src="{{ asset('storage/images/'.$post_image->user->image) }}"></p>
  <p>ユーザーネーム：{{ $post_image->user->name }}</p>
  <p>投稿日：{{ $post_image->created_at->format('Y/m/d') }}</p>
  @if($post_image->user->id==Auth::id())
    <form action="{{'/post_image/'.$post_image->id}}" method="POST">
      @csrf
      <button type="submit">削除</button>
    </form>
  @endif
</div>
@endsection