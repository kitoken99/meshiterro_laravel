@extends('layout.common')

@section('title', '投稿')
@section('content')
<div>
  <img src="{{ asset('storage/images/'.$post_image->get_image()) }}" width="100" height="100">
  <p>ショップ名：{{$post_image->shop_name}}</p>
  <p>説明：{{$post_image->caption}}</p>
  <p>投稿ユーザー画像：<a href="{{ '/user/'.$post_image->user->id }}"><img src="{{ asset('storage/images/'.$post_image->user->get_image()) }}" width="100" height="100"></a></p>
  <p>ユーザーネーム：{{ $post_image->user->name }}</p>
  <p>投稿日：{{ $post_image->created_at->format('Y/m/d') }}</p>
  @if($post_image->user->id==Auth::id())
    <form action="{{'/post_image/'.$post_image->id}}" method="POST">
      @csrf
      <button type="submit" style="border: none; outline: none; background: transparent;"><p>削除</p></button>
    </form>
  @endif
  @if($post_image->favorited_by())
  <form action="{{'/post_image/'.$post_image->id.'/favorites/destroy'}}" method="POST">
    @csrf
    <button type="submit" style="color: red; border: none; outline: none; background: transparent;"><p>いいね</p></button>
  </form>
  @else
  <form action="{{'/post_image/'.$post_image->id.'/favorites/create'}}" method="POST">
    @csrf
    <button type="submit" style="color: blue; border: none; outline: none; background: transparent;"><p>いいね</p></button>
  </form>
  @endif
</div>

<div>
  <p>いいね数: {{ $post_image->Favorites()->count() }}</p>
  <p>コメント件数:{{ count($post_comment)}}</p>
  @foreach($post_comment as $post_comment)
    <p><a href="{{ '/user/'.$post_comment->user_id }}"><img src="{{ asset('storage/images/'.$post_comment->user->get_image()) }}" width="80" height="80"></a></p>
    {{ $post_comment->user->name }}
    {{ $post_comment->comment }}
  @endforeach
  <form action="{{ '/post_image/'.$post_image->id.'/post_comments'}}" method="POST"  enctype="multipart/form-data">
    @csrf
    <textarea name="comment" id="comment" placeholder="コメントをここに"></textarea>
    <button type="submit">送信する</button>
  </form>
</div>
@endsection