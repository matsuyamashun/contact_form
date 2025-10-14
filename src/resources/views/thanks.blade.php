@extends ('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css')}}">

@endsection

@section('content')
<div class="background-text">Thank you</div>
    <div class="content">
        <h1 class="content__title">
        お問い合わせありがとうございました
        </h1>
        <a href="/">
            <button class="content__button">HOME</button>
        </a>
    </div>
</div>
@endsection