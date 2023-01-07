@extends('layouts.default')
@section('title','管理システム')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('/css/admin.css')}}">

@section('content')
<div class="container">
  <form action="/search" method="GET">
    @csrf
    <table class="search-table">
      <tr>
        <th>お名前</th>
        <td>
          <div class="first-tr">
            <input type="text" name="name" value="{{!empty($search['name']) ? $search['name'] : "" }}">
            <div class="radio">
              <legend for="gender">性別</legend>
              @empty($search['gender'])
              <input type="radio" name="gender" value="all" checked>
              <label for="all">全て</label>
              <input type="radio" name="gender" value="1">
              <label for="1">男性</label>
              <input type="radio" name="gender" value="2">
              <label for="2">女性</label>
              @else
              <input type="radio" name="gender" value="all" {{$search['gender']=='all' ? "checked" : ""}}>
              <label for="all">全て</label>
              <input type="radio" name="gender" value="1" {{$search['gender']==1 ? "checked" : ""}}>
              <label for="1">男性</label>
              <input type="radio" name="gender" value="2" {{$search['gender']==2 ? "checked" : ""}}>
              <label for="2">女性</label>
              @endempty
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th>登録日</th>
        <td>
          <div class="date-input">
            <input type="date" name="startdate" value="{{!empty($search['startdate']) ? $search['startdate'] : "" }}">
            <span>-</span>
            <input type="date" name="enddate" value="{{!empty($search['enddate']) ? $search['enddate'] : "" }}">
          </div>
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          @empty($search['email'])
          <input type="text" name="email">
          @else
          <input type="text" name="email" value="{{!empty($search['email']) ? $search['email'] : "" }}">
          @endempty
        </td>
      </tr>
    </table>
    <div class="button">
      <input type="submit" class="submit-button" value="検索">
    </div>
    <a href="/reset" class="reset">リセット</a>
  </form>
</div>
{{$contacts->links('vendor.pagination.Bootstrap-5')}}
<table class="result-table">
  <tr class="result-table__header">
    <th>ID</th>
    <th>お名前</th>
    <th>性別</th>
    <th>メールアドレス</th>
    <th>ご意見</th>
    <th></th>
  </tr>
  @foreach($contacts as $contact)
  <tr>
    <td>{{$contact->id}}</td>
    <td>{{$contact->fullname}}</td>
    @if($contact->gender===1)
    <td>男性</td>
    @else
    <td>女性</td>
    @endif
    <td>{{$contact->email}}</td>
    <td>
      <p class="opinion">
        @if(mb_strlen($contact->opinion)>=25)
        {{mb_substr($contact->opinion,0,25)}}...
        @else
        {{$contact->opinion}}
        @endif
      </p>
      <div class="detail">{{$contact->opinion}}</div>
    </td>
    <td>
      <form action="/delete" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$contact->id}}">
        <input type="submit" class="delete-button" value="削除">
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection