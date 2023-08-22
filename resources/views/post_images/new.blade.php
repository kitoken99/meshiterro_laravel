@extends('layout.common')

@section('title', 'new')
@include('layout.header')
@section('content')
<h1>画像投稿フォーム</h1>
  <form action="/post_image/store" method="POST"  enctype="multipart/form-data">
    @csrf
    <h4>画像</h4>
    <input type='file' name='image'>
    <h4>ショップ名</h4>
    <input type="text" name="shop_name">
    <h4>説明</h4>
    <textarea name="caption" id="caption"></textarea>
    <button type="submit">投稿</button>
  </form>
@endsection