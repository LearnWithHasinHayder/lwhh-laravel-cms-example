<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0px;
            padding: 0px;
            background: rgb(242, 242, 242);
            padding-bottom: 120px;
        }

        .topbar {
            height: 50px;
            background-color: #222;
        }

        .status {
            min-height: 80px;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        .author {
            font-size: 14px;
        }

        .author,
        .content {
            color: #555;
            line-height: 1.5em;
        }

        .date {
            padding-left: 10px;
            color: #aaa;
        }

        .header {
            background-color: #222;
            min-height: 200px;
        }

        .site-title {
            padding-top: 50px;
            text-align: center;
            font-size: 40px;
            color: #fff;
        }

        .actions, .actions a {
            color: #fff;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <div class="row-fluid no-gutters">
            <div class="col-md-12">
                <div class="topbar">

                </div>
            </div>

        </div>
    </div>
    <div class="header">
        <div class="container h-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-title">{{ $name ?? 'Home' }}</div>
                    <div class="actions">
                        @yield('actions')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('form');
    @yield('status');
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    ;(function(){
        $(document).ready(function(){
            
        });
      });
</script>
@yield('script')

</html>