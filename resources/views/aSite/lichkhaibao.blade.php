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
                            <td>Mở</td>
                            <td class="tick">
                                <input type="checkbox" onclick="tick(this)">
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
                        <p>Tổng: </p>
                        <ul>
                            <li class="title">{{ $down }}</li>
                            <li>
                                <p>Thái Bình</p>
                                <a onclick="popup_del()"><i class="fas fa-trash-alt"></i></a>
                            </li>
                            <li>
                                <p>Hải Dương</p>
                                <a onclick="popup_del()"><i class="fas fa-trash-alt"></i></a>
                            </li>
                        </ul>
                    </div>

            </div>
            
            <form id="delete" class="popup" action="">
                <div class="popup-content">
                    <div class="title">
                        <p>Bạn có chắc chắn muốn xóa ?</p>
                        <i class="far fa-question-circle"></i>
                    </div>
                    <div class="content">
                       
                    </div>
                    <div class="btn">
                        <button class="cancel_btn" type="reset" onclick="closePopup()">Hủy bỏ</button>
                        <button id="del_btn" class="submit_btn" type="submit" onclick="dell_click(this)">Xóa</button>
                    </div>
                </div>
            </form>
            <!-- <form id="edit" class="popup" action="">
                <div class="popup-content">
                    <div class="title">
                    </div>
                    <div class="content">
                        <div class="group" >
                           <p>Quyền khai báo</p>
                           <div class="row">
                                <div class="div-row">
                                    <label for="">Thời điểm bắt đầu:</label>
                                    <div style="margin-bottom: 20px">
                                        <input type="time" id="startTime-reset">
                                        <small></small>
                                    </div>
                                    <div>
                                        <input type="date" id="startDate-reset">
                                        <small></small>
                                    </div>
                                </div>
                                <div class="div-row">
                                    <label for="">Ngày kết thúc:</label>
                                    <div style="margin-bottom: 20px">
                                        <input type="time" id="endTime-reset">
                                        <small></small>
                                    </div>
                                    <div>
                                        <input type="date" id="endDate-reset">
                                        <small></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="btn">    
                            <button class="cancel_btn" type="reset" onclick="closePopup()">Hủy bỏ</button>
                            <button id="del_btn" class="submit_btn" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form> -->
           
        </div>
    </div>
  </section>
  
  <script src="{{ asset('js/aSite/js.js')}}"></script>
  <script>
    var delete_btn = document.querySelector(".province-box #delete");
    window.onclick = function(e){
        if(e.target == delete_btn || e.target == edit_data){
            delete_btn.style.display = "none";
        }
    }

    function closePopup(){
        delete_btn.style.display = "none";
    }
  </script>
</body>
</html>

