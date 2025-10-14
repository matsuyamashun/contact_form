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
        <td>{{$contact['last_name']}}{{$contact['firstname']}}
        <input type="hidden" name="last_name" value="{{$contact['last_name']}}" readonly />
        <input type="hidden" name="first_name" value="{{$contact['first_name']}}" readonly />
        </td>
    </tr>
    <tr>
        <th>性別</th>
        <td>
            @if($contact['gender']==1)
                男性
            @elseif($contact['genger']==2)
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
            {{$contact['tel']}}
            <input type="hidden" name="tel" value="{{$contact['tel']}}" readonly />
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
            {{$content['building']}}
            <input type="hidden" name="building" value="{{$contact['building']}}" readonly />
        </td>
    </tr>
    <tr>
        <th>お問い合わせの種類</th>
        <td>
            {{$category->contact}}
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
        <button type="submit" name="action" value="submit">送信</button>
        <button type="submit" name="action" value="submit">修正</button>
    </div>
</form>
</div>
@endsection