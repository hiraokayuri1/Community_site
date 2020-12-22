<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Community Site</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color:rgba(255,255,255,0.4);
                color: #ff3399;
                font-family: 'Nunito', sans-serif;
                font-weight: 800;
                height: 100vh;
                margin: 0;
                background-image: url("https://cdn-ak.f.st-hatena.com/images/fotolife/y/yuu_ad15/20201213/20201213224836.jpg");
                background-blend-mode:lighten;
                background-size: cover;
                
                font-size: 50px;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 60px;
            }

            .links > a {
                color: #CC33FF;
                padding: 0 25px;
                font-size: 25px;
                font-weight: 800;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .po {
                font-size: 20px;
                color: #000000;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links" style="padding-top: 350px;padding-right: 520px;">    
                    @auth
                        <a href="{{ url('/home') }}">ホーム画面</a>
                    @else
                  </div>
                    <div class="top-right links" style="padding-top: 350px;padding-right: 450px;">
                    <!-- <a href="{{ route('login') }}" class="btn btn-jobs">就活スケジュール</a> -->
                        <a href="{{ route('login') }}">ログイン</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                <!-- Job hunting blog site -->
                Community site
                </div>

                <div class="po">
                   
                </div>
            </div>
        </div>
    </body>
</html>
