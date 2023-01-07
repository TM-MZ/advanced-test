@extends('layouts.default')

<style>
  .form {
    display: flex;
    justify-content: center;
    width: 100%;
  }

  table td {
    width: 400px;
    padding: 30px 0;
  }

  table th {
    text-align: left;
    padding-right: 20px;
  }

  td p {
    color: #999;
    padding: 5px;
  }

  .submit-button {
    width: 100px;
    text-align: center;
    padding: 10px 0;
    margin: 20px 0;
    border: none;
    background-color: black;
    color: white;
    border-radius: 5px;
    cursor: pointer;
  }
</style>

@section('title','内容確認')

@section('content')

<form action="/add" method="post">
  @csrf
  <div class="form">
    <table>
      <tr>
        <th>お名前</th>
        <td>{{$items['familyname']}} {{$items['firstname']}}</td>
        <input type="hidden" name="familyname" value="{{$items['familyname']}}">
        <input type="hidden" name="firstname" value="{{$items['firstname']}}">
      </tr>
      <tr>
        <th>性別</th>
        <td>
          @if($items['gender']===1)
          男性
          @else
          女性
          @endif
        </td>
        <input type="hidden" name="gender" value="{{$items['gender']}}">
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{$items['email']}}</td>
        <input type="hidden" name="email" value="{{$items['email']}}">
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>{{$items['postcode']}}</td>
        <input type="hidden" name="postcode" value="{{$items['postcode']}}">
      </tr>
      <tr>
        <th>住所</th>
        <td>{{$items['address']}}</td>
        <input type="hidden" name="address" value="{{$items['address']}}">
      </tr>
      <tr>
        <th>建物名</th>
        <td>{{$items['building_name']}}</td>
        <input type="hidden" name="building_name" value="{{$items['building_name']}}">
      </tr>
      <tr>
        <th>ご意見</th>
        <td>{{$items['opinion']}}</td>
        <input type="hidden" name="opinion" value="{{$items['opinion']}}">
      </tr>
    </table>
  </div>
  <input type="submit" name="submit" class="submit-button" value="送信">
</form>
<a href="/">修正する</a>
@endsection