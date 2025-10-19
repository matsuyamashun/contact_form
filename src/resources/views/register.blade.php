<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
 
  <header class="header">
    <a class="header__logo" href="/">FashionablyLate</a>
    <nav class="header__nav">
      <a class="header__nav__link" href="/login">login</a>
    </nav>
  </header>

  
  <main class="main">
    <h2 class="main__title">Register</h2>

    <div class="content">
      <form class="register__form" action="{{ route('register')}}" method="POST">
        @csrf
        <div class="form__group">
          <label for="name">お名前</label>
          <input type="text" id="name" name="name" placeholder="例）山田太郎" value="{{ old('name')}}">
          @error('name')
            <div class="error">{{$message}}</div>
          @enderror
        </div>

        <div class="form__group">
          <label for="email">メールアドレス</label>
          <input type="email" id="email" name="email" placeholder="例）test@example.com" value="{{ old('email')}}">
        @error('email')
          <div class="error">{{$message}}</div>
        @enderror
        </div>

        <div class="form__group">
          <label for="password">パスワード</label>
          <input type="password" id="password" name="password" placeholder="例）coachtech1106">
        @error('password')
          <div class="error">{{$message}}</div>
        @enderror
        </div>
      

    <div class="form__button">
      <button class="form__button-submit" type="submit">登録</button>
    </div>
    </form>
    </div>
  </main>
</body>
</html>
