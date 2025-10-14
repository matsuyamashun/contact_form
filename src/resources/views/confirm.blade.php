@extends ('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css')}}">

@endsection

@section('content')
<div class="content">
    <h2 class="content__title">
        Contact
    </h2>

<form class="confirm__form" action="{{ route('contacts.store') }}" method="POST">
@csrf
<table class="confirm__form__table">
    <tr>
        <th>お名前</th>
        <td>{{$contact['last_name']}}{{$contact['first_name']}}
        <input type="hidden" name="last_name" value="{{$contact['last_name']}}" readonly />
        <input type="hidden" name="first_name" value="{{$contact['first_name']}}" readonly />
        </td>
    </tr>
    <tr>
        <th>性別</th>
        <td>
            @if($contact['gender']==0)
                男性
            @elseif($contact['gender']==1)
                女性
            @else
                その他
            @endif
            <input type="hidden" name="gender" value="{{$contact['gender']}}" readonly />
        </td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>
            {{$contact['email']}}
            <input type="hidden" name="email" value="{{$contact['email']}}" readonly />
        </td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>
                {{ $contact['tel1'] }}-{{ $contact['tel2'] }}-{{ $contact['tel3'] }}
    <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}"readonly/>
    <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}"readonly/>
    <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}"readonly/>
        </td>
    </tr>
    <tr>
        <th>住所</th>
        <td>
            {{$contact['address']}}
            <input type="hidden" name="address" value="{{$contact['address']}}" readonly />
        </td>
    </tr>
    <tr>
        <th>建物</th>
        <td>
            {{$contact['building']}}
            <input type="hidden" name="building" value="{{$contact['building']}}" readonly />
        </td>
    </tr>
    <tr>
        <th>お問い合わせの種類</th>
        <td>
             {{ $category->content }}
            <input type="hidden" name="category_id" value="{{$contact['category_id']}}" readonly />
        </td>
    </tr>
    <tr>
        <th>お問い合わせ内容</th>
        <td>
            {{$contact['detail']}}
            <input type="hidden" name="detail" value="{{$contact['detail']}}"readonly />
        </td>
    </tr>

</table>

    <div class="confirm__form__button">
        <button class="confirm__form__button__submit" type="submit" name="action" value="submit">送信</button>
        <button class="confirm__form__button__back"type="submit" name="action" value="back">修正</button>
    </div>
</form>
</div>
@endsection