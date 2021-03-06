<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="{{ asset('images/main_logo.png') }}"></a></h1>
            <div id="">
                <div id="">
                    <p>{{ $username }}さん<img src="{{ asset('images/'.Auth::user()->images) }}"></p>
                    <div class="puru-buttom"></div>
                    <nav class="navi">
                        <ul class="ac-buttom">
                            <li class="bc-buttom"><a href="/top">ホーム</a></li>
                            <li class="bc-buttom"><a href="/profile">プロフィール</a>
                            <li class="bc-buttom"><a href="logout">ログアウト</a></li>
                        </ul>
                    </nav>
                <div>
             </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ $username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ $countFollower }}名</p>
                </div>
                <p class="side-button"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{ $countFollow }}名</p>
                </div>
                <p class="side-button"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
                <p class="side-button"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>