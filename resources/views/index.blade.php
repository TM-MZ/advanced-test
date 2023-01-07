@extends('layouts.default')
@section('title','お問い合わせ')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
@section('content')
<form action="/" method="POST" class="h-adr">
  @csrf
  <div class="form">
    <table>
      <tr>
        <th><label for="name">お名前<span>※</span></label></th>
        <td>
          <div class="name-input">
            <div class="familyname">
              <input type="text" id="familyname" name="familyname" value="{{!empty($items['familyname']) ? $items['familyname'] : old('familyname')}}" required>
              <p>例）山田</p>
            </div>
            <div>
              <input type="text" id="firstname" name="firstname" value="{{!empty($items['firstname']) ? $items['firstname'] : old('firstname')}}" required>
              <p>例）太郎</p>
            </div>
          </div>
          @error('familyname')
          <p class="error-text">{{$message}}</p>
          @enderror
          @error('firstname')
          <p class="error-text">{{$message}}</p>
          @enderror
        </td>
      </tr>
      <tr>
        <th class="gender-title"><label for="gender">性別<span>※</span></label></th>
        <td class="radio">
          @empty($items['gender'])
          <input type="radio" class="radio-button" name="gender" value="1" checked>
          <label for="1" class="radio-label">男性
          </label>
          <input type="radio" class="radio-button" name="gender" value="2">
          <label for="2" class="radio-label">女性</label>
          @else
          <input type="radio" class="radio-button" name="gender" value="1" {{$items['gender'] ==1 ? "checked" : ""}}>
          <label for="1" class="radio-label">男性
          </label>
          <input type="radio" class="radio-button" name="gender" value="2" {{$items['gender'] ==2 ? "checked" : ""}}>
          <label for="2" class="radio-label">女性</label>
          @endempty
          @error('gender')
          <p class="error-text">{{$message}}</p>
          @enderror
        </td>
      </tr>
      <tr>
        <th><label for="email">メールアドレス<span>※</span></label></th>
        <td>
          <div>
            <input type="email" id="email" name="email" value="{{!empty($items['email']) ? $items['email'] : old('email')}}" required>
            <p>例）　test@example.com</p>
          </div>
          @error('email')
          <p class="error-text">{{$message}}</p>
          @enderror
        </td>
      </tr>
      <tr>
        <th><label for="postcode">郵便番号<span>※</span></label></th>
        <td>
          <div class="postcode-form">
            <p class="postcode-label">〒</p>
            <input type="text" id="postcode" name="postcode" class="p-postal-code" size="8" minlength="8" maxlength="8" value="{{!empty($items['postcode']) ? $items['postcode'] : old('postcode')}}" onblur="toHalfWidth(this)" required>
            <input type="hidden" class="p-country-name" value="Japan">
          </div>
          <p>例）　123-4567</p>
          @error('postcode')
          <p class="error-text">{{$message}}</p>
          @enderror
        </td>
      </tr>
      <tr>
        <th><label for="address">住所<span>※</span></label></th>
        <td>
          <input type="text" id="address" name="address" class="p-region p-locality p-street-address p-extended-address" value="{{!empty($items['address']) ? $items['address'] : old('address')}}" required>
          <p>例）　東京都渋谷区千駄ヶ谷1-2-3</p>
          @error('address')
          <p class="error-text">{{$message}}</p>
          @enderror
        </td>
      </tr>
      <tr>
        <th><label for="building_name">建物名<span></span></label></th>
        <td>
          <input type="text" id="building_name" name="building_name" value="{{!empty($items['building_name']) ? $items['building_name'] : old('building_name')}}">
          <p>例）　千駄ヶ谷マンション101</p>
          @error('building_name')
          <p class="error-text">{{$message}}</p>
          @enderror
        </td>
      </tr>
      <tr>
        <th class="opinion-title"><label for="opinion">ご意見<span>※</span></label></th>
        <td>
          <textarea id="opinion" name="opinion" cols="40" rows="4" maxlength="120" required>{{!empty($items['opinion']) ? $items['opinion'] : old('opinion')}}</textarea>
          @error('opinion')
          <p class="error-text">{{$message}}</p>
          @enderror
        </td>
      </tr>
    </table>
  </div>
  <input type="submit" class="submit-button" value="確認">
</form>
@endsection