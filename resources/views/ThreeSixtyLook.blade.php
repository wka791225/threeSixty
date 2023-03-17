<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        .direction {
            display: flex;
        }

        .create-wed {
            width: 100px;
            background-color: cyan;
            border-radius: 5%;
            text-align: center;
            cursor: pointer;
        }

        .send-file {
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
            gap: 10px;
        }

        .send-file .send {
            width: 100px;
            border: 1px solid black;
            border-radius: 5px;
            background-color: rgb(9, 250, 250);
            text-align: center;
            cursor: pointer;
        }

        .send-file sup {
            padding-top: 10px;
            color: red;
        }

        .img-send {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;

        }

        .hidden {
            display: none;
        }

        #three {
            width: 100%;
            height: 100%;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }
        #container{
            width: 100dvw;
            min-height: 100dvh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <main>
       
        <section id="container">
            <div class="img-send">
                <input type="hidden" class="img-list" value="{{$panorama}}">
                <div id="three">
                </div>
                {{-- <div class="direction">
                    <div class="prev">＜</div>
                    <div class="next">＞</div>
                </div> --}}
            </div>

        </section>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/@mladenilic/threesixty.js/dist/threesixty.js"></script>
    <script>
        const imgList = document.querySelector('.img-list').value;
        const list = JSON.parse(imgList);
        console.log(window);
        const threeSixty = new ThreeSixty(document.querySelector('#three'), {
            image: list,
            width: window.innerWidth ,
            height: window.innerHeight ,
            prev: document.querySelector('.prev'),
            next: document.querySelector('.next'),
        });
        
        threeSixty.init();
    </script>
</body>

</html>
