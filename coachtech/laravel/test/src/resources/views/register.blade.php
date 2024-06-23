@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register">
    <div class="register__header">
        <h2>FashionablyLate</h2>
        <a href="/login">login</a>
    </div>
    <div class="register__main">
        <h3>Register</h3>
        <form action="/register/store" method="post">
            @csrf
            <div class="register__main-contents">
                <div class="register__main-contents--name">
                    <p>お名前</p>
                    <input type="text" name="name" placeholder="例:山田 太郎"><br>
                    @error('name')
                    <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <div class="register__main-contents--email">
                <p>メールアドレス</p>
                <input type="email" name="email" placeholder="例:test@example.com"><br>
                @error('email')
                <span class="error">{{$message}}</span>
                @enderror
                </div>
                <div class="register__main-contents--password">
                    <p>パスワード</p>
                    <input type="text" name="password" placeholder="例:coachtech1106"><br>
                    @error('password')
                    <span class="error">{{$message}}</span>
                    @enderror
                </div>
                <button>登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
