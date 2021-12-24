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

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <link href="{{ asset('css/bSite/survey.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aSite/sidebar.css') }}" rel="stylesheet">
</head>
<body>

        @include('aSite.header')
        <div class="home-content">
            <div id="container">
                <div id="content">
                    <div id="mau">
                        <div id="quochieu">
                            <div class="half">
                                <div class="cent">
                                    <p>Ủy ban Nhân dân {{ $user->name }}</p>
                                </div>
                            </div>

                            <div class="half">
                                <div class="cent" id="vn">
                                    <p>Cộng hòa xã hội chủ nghĩa Việt Nam</p>
                                    <p>Độc lập - Tự do - Hạnh phúc</p>
                                </div>
                            </div>

                        </div>
                        <h2>Phiếu điều tra dân số</h2>
                        <div id="khaibao">
                            <div class="row">
                                <p>Họ tên: </p>
                                <p>Giới tính: </p>
                            </div>

                            <div class="row">
                                <p>Ngày sinh: </p>
                                <p>Số CMND/CCCD/HC: </p>
                            </div>

                            <div class="row">
                                <p>Nghề nghiệp: </p>
                                <p>Trình độ văn hóa: </p> 
                            </div>

                            <div class="row">
                                <p>Tôn giáo: </p>
                                <p>Quê quán: </p>
                            </div>


                            <div class="row">
                                <p>Địa chỉ thường trú:</p>
                            </div>
                            <div class="row">
                                <p>Địa chỉ tạm trú:</p>
                            </div>

                        </div>
                    
                    </div>
                </div>
                <button id="print"><i class='fas'>&#xf02f;</i> Print</button>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/bSite/survey.js')}}"></script>
    <script src="{{ asset('js/aSite/js.js')}}"></script>
</body>
</html>