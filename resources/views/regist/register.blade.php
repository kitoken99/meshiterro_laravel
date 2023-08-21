<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ユーザー登録フォーム</title>
</head>
<body>
  <h2>Sign up</h2>
  <form name="registform" action="sign_in" method="post" id="registform">
    {{ csrf_field() }}
      <label for="name">Name</label><br>
      <input type="text" name="name" id="name">
      <span>{{ $errors->first("name") }}</span><br>

      <label for="email">Email</label><br>
      <input type="text" name="email" id="email">
      <span>{{ $errors->first("email") }}</span><br>

      <label for="password">Password</label>
      <em>(6 characters minimum)</em><br />
      <input type="password" name="password" id="password">
      <span>{{ $errors->first("password") }}</span><br>

      <label for="password_confirmation">password confirmation</label><br>
      <input type="password" name="password_confirmation" id="password_confirmation" >
      <span>{{ $errors->first("password_confirmation") }}</span><br>

    <button type="submit" name="action" value="send">Sign up</button>
  </form>
</body>
</html>