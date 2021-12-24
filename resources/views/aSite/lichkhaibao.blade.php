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
    <link href="{{ asset('css/aSite/lichkhaibao.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aSite/popup.css') }}" rel="stylesheet">
    <title> document </title>
</head>
@include('aSite.header')
    <div class="home-content">
        <div class="province-box">
            <div class="title">
                <h2>Quản lý truy cập</h2>
                <p>Lịch khai báo</p>
            </div>

            <div class="table-data">
            <div class="table background-box"> 
                    <p>Lịch khai báo</p>
                    <input type="hidden" id="token" value="{{ @csrf_token() }}">
                    <input type="hidden" id="done_url" value="{{ route('admin.done', ['position' => $user->position ]) }}">
                    <table>
                        <tr>
                            <th class="center">STT</th>
                            <th>Thời điểm bắt đầu</th>
                            <th>Thời điểm kết thúc</th>
                            <th>Trạng thái</th>
                            <th class="center">Đánh dấu hoàn thành</th>
                        </tr>
                        @php
                            $stt = 1;
                        @endphp
                        @foreach ($schedule as $schedule)
                        <tr>
                            <td>{{ $stt++}}</td>
                            <td>
                                {{ $schedule->start_date." ".$schedule->start_time }}
                            </td>
                            <td>
                                {{ $schedule->end_date." ".$schedule->end_time }}
                            </td>
                            <td>{{ $schedule->status }}</td>
                            <td class="tick">
                                <a onclick="tick(this)">
                                <label><i class="fas fa-check tick-uncheck"></i></label>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="bottom">
                        <a href="">Xem thêm</a>
                    </div>
                </div>
                <div class="todo ">
                    <div class="head">
                        <p>Danh sách các {{ $down }} chưa hoàn thành</p>
                    </div>
                    
                    <div class="todo-list" id="todo-list">
                        <p>Tổng: {{ count($locals) }} </p>
                        <ul>
                            <li class="title">Tên {{ $down }}</li>

                            @foreach($locals as $local)
                                <li>
                                    <p>{{ $local->name }}</p>
                                    <a onclick="">Nhắc nhở</a>
                                </li>
                            @endforeach
                            
                    </div>

            </div>
            
            
        </div>
    </div>
  </section>
  <script src="{{ asset('js/aSite/js.js')}}"></script>
  <script src="{{ asset('js/aSite/schedule.js')}}"></script>
  
  
</body>
</html>

