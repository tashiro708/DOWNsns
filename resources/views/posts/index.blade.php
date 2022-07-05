@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->

<form action="tweet" method="post">
  {{ csrf_field() }} <!-- CSRFトークン おなじpw-->
  <div class="top_icon">
    <img src="images/{{Auth::user()->images}}" >
  </div>
  
  <input type="text" name="tweet" placeholder="何をつぶやこうか？">
  <input src="images/post.png" type="image">
  <!-- <input type="submit"> -->
  
</form>


<table>
  @foreach ($list as $list) <!--つぶやき表示-->
  <tr>
    <td><img src="images/{{$list->images}}"></td>
    <td>{{ $list->username }}</td>
    <td>{{ $list->posts }}</td>
    <td>{{ $list->created_at }}</td>

    @if ($list->user_id == Auth::id() )
    <!-- モーダル -->
      <td><a href="" class="modalopen" data-target="modal{{$list->id}}"><img src="images/edit.png"></td>

    <td><a href="/post/{{$list->id}}/delete"><img src="images/trash_h.png"  onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')" ></a></td>
    @endif

    <!-- モーダル中身 -->
  <div class="modal-main js-modal" id="modal{{$list->id}}">
    <div class="inner">
      <p class="inner-title">編集しましょう</p>
     
      <form action="/post/edit" method="post">
      {{ csrf_field() }}
        <div class="edit">
          <input type="hidden" name="id" value="{{ $list->id}}">
          <input type="text" name="edit" placeholder="つぶやいた内容を表示します。">

          <button type="submit">>更新</button>

        </div>
        <a href="" class="modalClose">Close</a>
      </form>
    </div>
  </div>
  </tr>
  @endforeach

</table>


@endsection