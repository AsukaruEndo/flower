<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="content-language" content="ja">
        <meta name="application-name" content="WEBFlower">
        <meta name="robots" content="noindex,nofollow">
        <meta name="author" content="ASUKARU">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- google jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <title>WEBSYSTEM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- public/css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <!-- Ajax -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        <script src="{{ asset('js/table.js') }}"></script>
        <!-- Handsontable CDN -->
        <script src="https://cdn.jsdelivr.net/npm/handsontable-pro@6.1.1/dist/handsontable.full.min.js"></script><link href="https://cdn.jsdelivr.net/npm/handsontable-pro@6.1.1/dist/handsontable.full.min.css" rel="stylesheet" media="screen">
        </style>
    </head>
    <body>
        @yield('content')
        @yield('tables')
    </body>
</html>