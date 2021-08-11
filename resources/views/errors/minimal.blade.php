<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #2876AB;
                color: #636b6f;
                font-family: 'Cairo', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            
            button{
                display: block;
                position: relative;
                margin: auto;
                padding: 10px 30px;
                border-radius: 12px;
                background: #ebad52;
                border: none;
                color: #fff;
                font-size: 15px;
            }


            p{
                text-align: center;
                color: #fff;
            }
                    
        </style>
    </head>
    <body class="flex-center position-ref full-height">
        <div>
        
            <img src="{{asset('web/images/404.svg')}}" class="img-thumbnail" alt=""/>
            <button type="button" class="btn btn-warning">@yield('code') {{admin('ERROR')}}</button>
            <p>@yield('message')</p>
            </div>
        
    </body>
</html>
