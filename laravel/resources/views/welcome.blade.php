<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('api.png') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .jumbotron {
            background-color: #f8f8f8;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .jumbotron h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .app-version {
            font-size: 16px;
            color: #888;
            text-align: center;
        }

        @media screen and (max-width: 600px) {
            .jumbotron h1 {
                font-size: 24px;
            }
        }

        @media screen and (max-width: 400px) {
            .jumbotron h1 {
                font-size: 20px;
            }
        }

        @media screen and (max-width: 800px) {
            .container {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Todo API</h1>
        </div>

        <div class="app-version">
            App Version: {{ env('APP_VERSION') }}
        </div>
    </div>
</body>

</html>
