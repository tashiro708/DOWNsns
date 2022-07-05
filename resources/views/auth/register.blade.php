@extends('layouts.logout')

@section('content')

<div class="login-page">

  {!! Form::open() !!}


  
  <div class="start-two"> 
    <div class="start-group">
      <p>新規ユーザー登録</p>

      <h2 class="user-group">UserName</h2>
      {{ Form::label('ユーザー名') }}
      {{ Form::text('username',null,['class' => 'input']) }}
    <!-- username=ラジコン周波数 -->
      @if ($errors->has('username')) 
      {{ $errors->first('username') }}
      <!-- エラー文 -->
      @endif
      <h2 class="user-group">MailAdress</h2>
      {{ Form::label('メールアドレス') }}
      {{ Form::text('mail',null,['class' => 'input']) }}
      @if ($errors->has('mail')) 
      {{ $errors->first('mail') }}
      <!-- エラー文 -->
      @endif
  
    
      <h2 class="user-group">Password</h2>
      {{ Form::label('パスワード') }}
      {{ Form::text('password',null,['class' => 'input']) }}
      @if ($errors->has('password')) 
      {{ $errors->first('password') }}
      <!-- エラー文 -->
      @endif
    
      <h2 class="user-group">Password cofim</h2>
      {{ Form::label('パスワード確認') }}
      {{ Form::text('passwordconfirm',null,['class' => 'input']) }}
      @if ($errors->has('passwordconfrim')) 
      {{ $errors->first('passwordconfrim') }}
      <!-- エラー文 -->
      @endif

      <div class="login-form">
        {{ Form::submit('REGISTER') }}
          <a href="/login">ログイン画面へ戻る</a> 
      </div>
      
      {!! Form::close() !!}
    </div>
    
  </div>  
</div>  


@endsection
