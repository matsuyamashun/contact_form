@extends ('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">

@endsection


@section('content')
<div class="content">
    <h2 class="content__title">Contact</h2>
</div>

<form class="content__form" action="{{ route('contacts.confirm') }}" method="POST">
    @csrf

    {{-- お名前 --}}
    <div class="form__group">
        <label>お名前 <span>※</span></label>
        <div class="content__form__name-input">
            <input class="name__input" type="text" name="last_name" placeholder="例）山田" value="{{ old('last_name') }}">
            <input class="name__input" type="text" name="first_name" placeholder="例）太郎" value="{{ old('first_name') }}">
        </div>
        @error('last_name')
            <div class="form__error">{{ $message }}</div>
        @enderror
        @error('first_name')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    {{-- 性別 --}}
    <div class="form__group">
        <label>性別 <span>※</span></label>
        <div class="content__form__name-input">
            <label><input class="gender-input" type="radio" name="gender" value="0" {{ old('gender')=='1' ? 'checked' : '' }}>男性</label>
            <label><input class="gender-input" type="radio" name="gender" value="1" {{ old('gender')=='2' ? 'checked' : '' }}>女性</label>
            <label><input class="gender-input" type="radio" name="gender" value="2" {{ old('gender')=='3' ? 'checked' : '' }}>その他</label>
        </div>
        @error('gender')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    {{-- メールアドレス --}}
    <div class="form__group">
        <label>メールアドレス <span>※</span></label>
        <div class="content__form__name-input">
            <input class="email-input" type="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}">
        </div>
        @error('email')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    {{-- 電話番号 --}}
    <div class="form__group">
        <label>電話番号 <span>※</span></label>
        <div class="content__form__name-input tel-group">
            <input class="tel-input" type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}">
            <span>-</span>
            <input class="tel-input" type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
            <span>-</span>
            <input class="tel-input" type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
        </div>
        @error('tel1')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    {{-- 住所 --}}
    <div class="form__group">
        <label>住所 <span>※</span></label>
        <div class="content__form__name-input">
            <input class="address_input" type="text" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
        </div>
        @error('address')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    {{-- 建物名 --}}
    <div class="form__group">
        <label>建物名</label>
        <div class="content__form__name-input">
            <input class="building__input" type="text" name="building" placeholder="例）千駄ヶ谷マンション101" value="{{ old('building') }}">
        </div>
        @error('building')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    {{-- お問い合わせの種類 --}}
    <div class="form__group">
        <label>お問い合わせの種類 <span>※</span></label>
        <div class="content__form__name-input">
            <select class="category__select" name="category_id">
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('category_id')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    {{-- お問い合わせ内容 --}}
    <div class="form__group">
        <label>お問い合わせ内容 <span>※</span></label>
        <div class="content__form__name-input">
            <textarea class="detail__textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        </div>
        @error('detail')
            <div class="form__error">{{ $message }}</div>
        @enderror
    </div>

    {{-- 送信ボタン --}}
    <div class="form__button">
        <button class="form__button-submit" type="submit">確認画面</button>
    </div>

</form>
@endsection
