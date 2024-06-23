@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/thanks.css')}}">
@endsection
<div class="thanks">
  <div class="back-text">Thank you</div>
  <div class="front-text">
    <p>お問い合わせありがとうございました</p>
    <a style="text-decoration:none" href="/">HOME</a>
  </div>
</div>
@section('content')
@endsection