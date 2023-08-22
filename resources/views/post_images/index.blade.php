@foreach($post_images as $post_image)
  <div>
    <img src="{{ asset('storage/images/'.$post_image->get_image()) }}">
    <p>投稿ユーザー画像：<img src="{{ asset('storage/images/'.$post_image->user->image) }}"></p>
    <p>ショップ名：{{$post_image->shop_name}}</p>
    <p>説明：{{$post_image->caption}}</p>
    <p>ユーザーネーム：{{ $post_image->user->name }}</p>
  </div>
@endforeach