@extends('layouts.login')

@section('content')


<form action="search-result" method="post">
{{ csrf_field() }}
  <input name="search" type = "text" placeholder="ユーザー名">
  <button type = "submit">検索</button>
</form>
@if(isset($word)) <!-- isset変数に値が入っているか確認 -->
<P>{{$word}}</P>
@endif


<!-- 一覧表示 -->
<table>

  @foreach ($users as $list) <!--検索表示-->
    <tr>
      <td><img src="images/{{$list->images}}"></td>
      <td>{{ $list->username }}</td>
    </tr> 
    @if(in_array($list->id , array_column($follow, 'follow')))
    <td>
      <div class="follow-puru">
        <a  href="/user/{{$list->id}}/remove">フォローを外す</a>
      </div>
    </td>
    @else
    <td>
      <div class="aufollow-puru">
        <a href="/user/{{$list->id}}/follow">フォローする</a>
      </div>
    </td>
    @endif

  @endforeach  


</table>

@endsection