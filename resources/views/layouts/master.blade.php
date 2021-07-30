<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ropa a</title>
    <!-- CSRF Token -->


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/img/favicon.ico" type="/img/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/img/apple-touch-icon.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

    <!--     Include UIKit CSS   -->
    <link rel="stylesheet" href="{{asset('/css/all.css')}}">

    <style>
        .glyphicon {
            margin-right: 5px;
        }

        .thumbnail {
            margin-bottom: 20px;
            padding: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
        }

        .item.list-group-item {
            float: none;
            width: 100%;
            background-color: #fff;
            margin-bottom: 10px;
        }

        .item.list-group-item:nth-of-type(odd):hover,
        .item.list-group-item:hover {
            background: #428bca;
        }

        .item.list-group-item .list-group-image {
            margin-right: 10px;
        }

        .item.list-group-item .thumbnail {
            margin-bottom: 0px;
        }

        .item.list-group-item .caption {
            padding: 9px 9px 0px 9px;
        }

        .item.list-group-item:nth-of-type(odd) {
            background: #eeeeee;
        }

        .item.list-group-item:before,
        .item.list-group-item:after {
            display: table;
            content: " ";
        }

        .item.list-group-item img {
            float: left;
        }

        .item.list-group-item:after {
            clear: both;
        }

        .list-group-item-text {
            margin: 0 0 11px;
        }
        .col1 {
            flex: 1;
        }

    </style>
</head>

<body>

    <!--     start Header Section   -->
    <div id="app">
        <nav class="uk-navbar uk-navbar-secondary  uk-hidden-small">
            <div class="uk-container-center uk-container">
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="">Movies</a></li>
                </ul>
            </div>
        </nav>

        <div>
            <router-view></router-view>
        </div>

    </div>

    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/all.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
</body>

</html>
