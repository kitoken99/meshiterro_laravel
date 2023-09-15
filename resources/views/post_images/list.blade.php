@foreach($post_images as $post_image)
  <div>
    <a href={{ 'post_image/'.$post_image->id }} >
    <img src="{{ asset('storage/images/'.$post_image->get_image()) }}"width="100" height="100">
    </a>
    <p>投稿ユーザー画像：<a href="{{ 'user/'.$post_image->user->id }}"><img src="{{ asset('storage/images/'.$post_image->user->get_image()) }}"width="100" height="100"></a></p>
    <p>ショップ名：{{$post_image->shop_name}}</p>
    <p>説明：{{$post_image->caption}}</p>
    <p>ユーザーネーム：{{ $post_image->user->name }}</p>
    <p><a href={{ '/post_image/'.$post_image->id }}>
    {{ count($post_image->PostComments) }}コメント
    </a></p>
  </div>
@endforeach
