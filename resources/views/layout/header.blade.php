@section('header')
<header>
  @if (Auth::check())
    <li><a href='/users/sign_out' method="delete">ログアウト</a></li>
  @else
    <li><a href='/users/sign_up'>新規登録</a></li>
    <li><a href='/users/sign_in'>ログイン</a></li> 
  @endif
</header>
@endsection