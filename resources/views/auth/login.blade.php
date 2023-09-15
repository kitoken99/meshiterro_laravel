@extends('layout.common')

@section('title', 'ログイン')
@section('content')
    <h2>Log in</h2>
    <form name="loginform" action="/users/sign_in" method="post">
      {{ csrf_field() }}
      <label for="email">Email</label><br>
      <input type='text' name="email" id="email"><br>

      <label for="password">Password</label><br>
      <input type='password' name="password" id="password"><br>


      <button type="submit" name="action" value="send">Log in</button>
    </form>
    <a href="users/sign_up">Sign up</a>
@endsection