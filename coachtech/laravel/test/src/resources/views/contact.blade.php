@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection
<div class="contact">
    <div class="contact__header">
        <h1>FashionablyLate</h1>
    </div>
    <div class="contact__main">
        <h2>Contact</h2>
        <div class="contact__main-contents">
            <form action="/confirm" method="post">
                @csrf
                <table>
                    <tr class="name">
                        <th>お名前<span>※</span></th>
                        <td>
                            <input type="text" name="last_name" placeholder="例:山田" value="{{old('last_name')}}">
                            <input type="text" name="first_name" placeholder="例:太郎" value="{{old('first_name')}}">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td class="error">
                            @error('first_name')
                            {{$message}}
                            @enderror
                            @error('last_name')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>
                    <tr class="radio">
                        <th>性別<span>※</span></th>
                        <td>
                            <input type="radio" name="gender" value="1" checked>男性
                            <input class="gender" type="radio" name="gender" value="2">女性
                            <input class="gender" type="radio" name="gender" value="3">その他
                        </td>
                        <tr>
                            <th></th>
                            <td class="error">
                                @error('gender')
                                {{$message}}
                                @enderror
                            </td>
                        </tr>
                    </tr>
                    <tr class="text">
                        <th>メールアドレス<span>※</span></th>
                        <td>
                            <input type="email" name="email" placeholder="例:test@example.com" value="{{old('email')}}">
                        </td>
                        <tr>
                            <th></th>
                            <td class="error">
                                @error('email')
                                {{$message}}
                                @enderror
                            </td>
                        </tr>
                    </tr>
                    <tr class="tell">
                        <th>電話番号<span>※</span></th>
                        <td>
                            <input type="text" name="tell_1" placeholder="080" value="{{old('tell_1')}}">
                            <span>-</span>
                            <input type="text" name="tell_2" placeholder="1234" value="{{old('tell_2')}}">
                            <span>-</span>
                            <input type="text" name="tell_3" placeholder="5678" value="{{old('tell_3')}}">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td class="error">
                            @error('tell_1')
                            {{$message}}
                            @enderror
                            @error('tell_2')
                            {{$message}}
                            @enderror
                            @error('tell_3')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>
                    <tr class="text">
                        <th>住所<span>※</span></th>
                        <td>
                            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td class="error">
                            @error('address')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>
                    <tr class="text">
                        <th>建物名</th>
                        <td>
                            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{old('building')}}">
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th>お問い合わせの種類<span>※</span></th>
                        <td>
                            <select name="category_id" id="">
                                <option value="">選択してください</option>
                                @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['content']}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td class="error">
                            @error('category_id')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容<span>※</span></th>
                        <td>
                            <textarea cols="50" rows="5" type=text name="detail" id="" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td class="error">
                            @error('detail')
                            {{$message}}
                            @enderror
                        </td>
                    </tr>
                </table>
                <button>確認画面</button>
            </form>
        </div>
    </div>
</div>
@section('content')
