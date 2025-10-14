@extends ('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css')}}">

@endsection

@section('content')
    <div class="content">
    <h1 class="content__title">
        お問い合わせありがとうございました
    </h1>
    <a href="/">
    <button class="content__button">HOME</button>
    </a>
</div>
@endsection