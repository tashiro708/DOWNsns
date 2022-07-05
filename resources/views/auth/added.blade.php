@extends('layouts.logout')

@section('content')

<div class="completion-form">
  <div class="completion">
    <p>{{$username->username}}さん、</p>
    <!-- 連想配列からusername -->
    <p>ようこそ！DAWNSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>さっそく、ログインをしてみましょう。</p>
    <a href="/login">ログイン画面へ</a>
  </div>  
</div>

@endsection