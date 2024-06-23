@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<div class="login">
    <div class="login__header">
        <h3>FashionablyLate</h3>
        <a href="/register">register</a>
    </div>
    <div class="login__main">
        <h3>Login</h3>
        <form action="/admin" method="post">
            @csrf
            <div class="login__main-contents">
                <div class="login__main-contents--email">
                <p>メールアドレス</p>
                <input type="email" name="email" placeholder="例:test@example.com">
                </div>
                @error('email')
                <span class="error">{{$message}}</span>
                @enderror
                <div class="login__main-contents--password">
                <p>パスワード</p>
                <input type="text" name="password" placeholder="例:coachtech1106">
                </div>
                @error('password')
                <span class="error">{{$message}}</span>
                @enderror
                <button>ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection