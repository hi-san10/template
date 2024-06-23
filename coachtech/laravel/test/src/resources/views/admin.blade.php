@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<div class="admin">
    <div class="admin__header">
        <h1 class="admin__header-title">FashionablyLate</h1>
        <a href="/logout">logout</a>
    </div>
    <div class="admin__main">
        <h3>Admin</h3>
        <div class="admin__main-contents">
            <form action="/admin/search" method="get">
                @csrf
            <div class="admin__main-contents--search">
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                <select name="gender" id="">
                    <option value="">性別</option>
                    <option value="">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select name="category_id" id="">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                    @endforeach
                </select>
                <input type="date" name="date">
                <button>検索</button>
                <button>リセット</button>
            </div>
            </form>
            <form action="/admin/csv" method="post">
            @csrf
            <div class="admin__main-contents--page">
                <button>エクスポート</button>
                {{$contacts->appends(request()->input())->Links()}}
            </div>
            <div class="admin__main-contents--header">
                <table>
                    @foreach($contacts as $contact)
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                    </tr>
                    <tr>
                        <td>
                            {{$contact['last_name']}}
                        </td>
                        <td>
                            {{$contact['first_name']}}
                        </td>
                        @if($contact['gender'] == 1)
                        <td>
                            男性
                        </td>
                        @elseif($contact['gender'] == 2)
                        <td>
                            女性
                        </td>
                        @else
                        <td>
                            その他
                        </td>
                        @endif
                        <td>
                            {{$contact['email']}}
                        </td>
                        <td>
                            {{$contact['category']['content']}}
                        </td>
                        <td>
                            <button>詳細</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            </form>
            <div class="admin__main-contents--user">
            </div>
        </div>
    </div>
</div>
@endsection