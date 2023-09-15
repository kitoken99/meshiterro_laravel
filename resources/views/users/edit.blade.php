@extends('layout.common')

@section('title', 'ユーザー詳細')
@include('layout.header')
@section('content')
<div>
  <form action="{{ '/user/'.$user->id }}" method="POST"  enctype="multipart/form-data">
    @csrf
    Name <input type="text" name="name" value="{{ $user->name }}">
    ProfileImage<input type='file' name='image'>
    <button type="submit">変更を保存</button>
  </form>
</div>
@endsection