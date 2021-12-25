<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
    <link href="{{ asset('css/aSite/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aSite/thongbao.css') }}" rel="stylesheet">
    <title> document </title>
</head>
@include('aSite.header')

    <div class="home-content">
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

  </section>
  <script src="{{ asset('js/aSite/thongbao.js')}}"></script>
</body>
</html>

