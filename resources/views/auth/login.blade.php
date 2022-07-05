@extends('layouts.logout')

@section('content')

{!! Form::open() !!}


  <div class="start-two">
    <div class="start-puru">
      <p>DAWNSNSへようこそ</p>
      <h2 class="user-group">MailAdress</h2>
      {{ Form::text('mail',null,['class' => 'usertype']) }}
      <h2 class="user-group">password</h2>
      {{ Form::password('password',['class' => 'usertype']) }}
       <div class="login-puru">
          {{ Form::submit('ログイン') }}
       </div>
        <p><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
  </div>

{!! Form::close() !!}

@endsection
