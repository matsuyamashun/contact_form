<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ詳細</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin_show.css') }}">
</head>
<body>

 

  <main class="admin-show">
    <div class="admin-show__container">
      <a href="{{ route('admin.index') }}" class="close-button">×</a>
      
      <table class="admin-show__table">
        <tr><th>お名前</th><td>{{ $content->last_name }}　{{ $content->first_name }}</td></tr>
        <tr><th>性別</th><td>
          @if($content->gender == 1) 男性
          @elseif($content->gender == 2) 女性
          @else その他 @endif
        </td></tr>
        <tr><th>メールアドレス</th><td>{{ $content->email }}</td></tr>
        <tr><th>電話番号</th><td>{{ $content->tel }}</td></tr>
        <tr><th>住所</th><td>{{ $content->address }}</td></tr>
        <tr><th>建物名</th><td>{{ $content->building }}</td></tr>
        <tr><th>お問い合わせの種類</th><td>
          @switch($content->category_id)
            @case(1) 商品のお届けについて @break
            @case(2) 商品の交換について @break
            @case(3) 商品トラブル @break
            @case(4) ショップへのお問い合わせ @break
            @case(5) その他 @break
          @endswitch
        </td></tr>
        <tr><th>お問い合わせ内容</th><td>{{ $content->detail }}</td></tr>
      </table>

      <form action="{{ route('admin.destroy', $content->id) }}" method="POST" class="delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button">削除</button>
      </form>
    </div>
  </main>

</body>
</html>
