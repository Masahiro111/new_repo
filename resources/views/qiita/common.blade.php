<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Qiita風記事投稿サービス</title>
    <!-- cssをインポート -->
    <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('css/bootstrapv5.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    @include('qiita.header')
    @yield('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/marked.min.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
</body>

</html>