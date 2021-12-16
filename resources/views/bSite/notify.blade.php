<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu điều tra</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{ asset('css/bSite/header.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bSite/survey.css') }}">
</head>
<body>

    @include('bSite.header')
    <div id="container">
        <div class="noticePage">
            <div class="noticeTop">
                <a onclick="noticeChecked()">Đánh dấu Đã đọc tất cả </a>
            </div>
            <div class="notification">
                <div>
                    <p class="title" id="title">Thông báo 1</p>
                    <p class="notify"></p>
                </div>
                <div>
                    <p class="title" id="title">Thông báo 1</p>
                    <p class="notify"></p>
                </div>
                <div>
                    <p class="title" id="title">Thông báo 1</p>
                    <p class="notify"></p>
                </div>
                <div>
                    <p class="title" id="title">Thông báo 1</p>
                    <p class="notify"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function noticeChecked(){
            var notice = document.querySelectorAll(".notification div");
            notice.forEach(element => {
                element.classList.add("noticeBackground");
            });
        }
    </script>
    <script src="{{ asset('js/bSite/survey.js')}}"></script>
</body>
</html>