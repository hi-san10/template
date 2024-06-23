@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="confirm">
    <div class="confirm__header">
        <h1 class="confirm__header-title">FashionablyLate</h1>
    </div>
    <div class="confirm__main">
        <h2 class="confirm__main-title">Confirm</h2>
        <div class="confirm__main-contents">
            <form action="/contact/store" method="post">
                @csrf
            <table>
                <tr class="name">
                    <th>お名前</th>
                    <td>
                        <input type="text" name="last_name" value="{{$contact['last_name']}}" readonly>
                        <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        @if($contact['gender'] == 1)
                        <input type="text" value="男性" readonly>
                        <input type="hidden" name="gender" value="{{$contact['gender']}}">
                        @elseif($contact['gender'] == 2)
                        <input type="text" value="女性" readonly>
                        <input type="hidden" name="gender" value="{{$contact['gender']}}">
                        @else
                        <input type="text" value="その他" readonly>
                        <input type="hidden" name="gender" value="{{$contact['gender']}}">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        <input type="email" name="email" value="{{$contact['email']}}" readonly>
                    </td>
                </tr>
                <tr class="tell">
                    <th>電話番号</th>
                    <td>
                        <input type="text" value="{{$contact['tell_1']}}{{$contact['tell_2']}}{{$contact['tell_3']}}" readonly>
                        <input type="hidden" name="tell_1" value="{{$contact['tell_1']}}">
                        <input type="hidden" name="tell_2" value="{{$contact['tell_2']}}">
                        <input type="hidden" name="tell_3" value="{{$contact['tell_3']}}">
                    </td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>
                        <input class="address" type="text" name="address" value="{{$contact['address']}}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>
                        <input class="building" type="text" name="building" value="{{$contact['building']}}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>
                        <input class="category" type="text" value="{{$content->content}}" readonly>
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                    </td>
                </tr>
                <tr>
                    <th>お問合わせ内容</th>
                    <td>
                        <textarea class="detail" type="text" name="detail" readonly>{{$contact['detail']}}</textarea>
                    </td>
                </tr>
            </table>
            <button class="send">送信</button>
            <button class="fixes" name="back" value="back"><u>修正</u></button>
            </form>
        </div>
    </div>
</div>
@endsection