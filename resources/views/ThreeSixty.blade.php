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
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        table,th,td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <main>
        <section id="container">
            <div class="img-send">
                <div id="three">
                </div>
                <div class="direction">
                    <div class="prev">＜</div>
                    <div class="next">＞</div>
                </div>
                <form action="/three-sixty/store" method="POST" enctype="multipart/form-data">
                    <div class="send-file">
                        @csrf
                        <div class="send">請選擇檔案</div>
                        <input class="hidden img-file" type="file" class="form-control" id="intro_img" value=""
                            name="intro_img[]" required multiple accept=".png,.jpg,.jpeg">
                        <sup>限制30張圖片</sup>

                    </div>
                    <div class="create-wed" onclick="document.querySelector('form').submit()">生成網址</div>
                </form>

                <table style="width: 100%; ">
                    <thead>
                        <tr>
                            <th>360連結</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panorama as $item)
                            <tr>
                              <td>

                                <a href="/three-sixty/look/{{ $item->id }}/{{ $item->url }}"  target="_blank">
                                  點擊查看
                                </a>
                              </td>
                              <td>
                                <a href="/three-sixty/delete/{{ $item->id }}">
                                 刪除
                                </a>

                              </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </section>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/@mladenilic/threesixty.js/dist/threesixty.js"></script>
    <script>
        const send = document.querySelector('.send');
        const file = document.querySelector('.img-file');
        const imgTest = document.querySelector('.test-img');
        const sendImg = document.querySelector('.send-img');
        const form = document.querySelector('form');
        const imgPath = [];
        send.addEventListener('click', () => {
            file.click();
        });

        file.addEventListener('change', () => {
            const imgfiles = file.files;
            if (imgfiles.length <= 0 || imgfiles.length > 30) {
                alert('請正確上傳圖片張數，限制為30張圖片');
                form.reset();
            }
            for (let i = 0; i < imgfiles.length; i++) {
                const img = imgfiles[i];
                console.log(imgfiles);

                const reader = new FileReader();
                reader.readAsDataURL(img);
                reader.addEventListener('load', (event) => {
                    const base64String = event.target.result;
                    imgPath.push(base64String);
                    if (i === imgfiles.length - 1) {
                        const threeSixty = new ThreeSixty(document.querySelector('#three'), {
                            image: imgPath,
                            prev: document.querySelector('.prev'),
                            next: document.querySelector('.next')
                        });
                        threeSixty.init();
                    }
                });
            }
            console.log(imgPath);
        });
    </script>
</body>

</html>
