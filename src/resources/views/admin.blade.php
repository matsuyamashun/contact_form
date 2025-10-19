<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
 
  <header class="header">
    <a class="header__logo" href="/">FashionablyLate</a>
    <nav class="header__nav">
      <a class="header__nav__link" href="/login">logout</a>
    </nav>
  </header>

  
  <main class="main">
    <div class="content">
        <h2 class="content__title">Contact</h2>

     <form class="search__form" action="{{ route('admin.index') }}" method="GET">
      <div class="search__row1">
        <input type="text" name="keyword" placeholder="名前かメールアドレスを入力してください" value="{{ request('keyword') }}">

        <select name="gender">
          <option value="">性別</option>
          <option value="1" @if(request('gender') == 1) selected @endif>男性</option>
          <option value="2" @if(request('gender') == 2) selected @endif>女性</option>
          <option value="3" @if(request('gender') == 3) selected @endif>その他</option>
        </select>

        <select name="category_id">
          <option value="">お問い合わせの種類</option>
          <option value="1" @if(request('category_id') == 1) selected @endif>商品のお届けについて</option>
          <option value="2" @if(request('category_id') == 2) selected @endif>商品の交換について</option>
          <option value="3" @if(request('category_id') == 3) selected @endif>商品トラブル</option>
          <option value="4" @if(request('category_id') == 4) selected @endif>ショップへのお問い合わせ</option>
          <option value="5" @if(request('category_id') == 5) selected @endif>その他</option>
        </select>

        <input type="date" name="date" value="{{ request('date') }}">

        <button type="submit" class="btn-search">検索</button>
        <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
      </div>

      <div class="search__row2">
        <button type="submit" name="export" value="1" class="btn-export">エクスポート</button>
        <div class="pagination">
        {{ $contents->links() }}
        </div>
      </div>
    </form>

      
      <table class="admin__table">
        <thead>
          <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($contents as $content)
          <tr>
            <td>{{ $content->last_name }} {{ $content->first_name }}</td>
            <td>
              @if($content->gender == 1)
                男性
              @elseif($content->gender == 2)
                女性
              @else
                その他
              @endif
            </td>
            <td>{{ $content->email }}</td>
            <td>
              @switch($content->category_id)
                @case(1) 商品のお届けについて @break
                @case(2) 商品の交換について @break
                @case(3) 商品トラブル @break
                @case(4) ショップへのお問い合わせ @break
                @case(5) その他 @break
              @endswitch
            </td>
            <td><a href="{{ route('admin.show', $content->id) }}" class="detail_button">詳細</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>