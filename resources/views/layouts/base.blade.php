<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Site Properties -->
    <title>AppliJuice</title>
</head>

<body>
    <div id="app">
        <nav-bar></nav-bar>
        @yield('content')
    </div>
</body>

<style>
    .el-header, .el-footer {
        background-color: #FFFFFF;
        color: #333;
        text-align: center;
        line-height: 20px;
        /*height: 100px;*/

    }

    * {
        font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;
    }

</style>

@yield('scripts')

@yield('styles')

</html>
