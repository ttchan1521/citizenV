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
 
    <link href="{{ asset('css/aSite/phanquyen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aSite/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aSite/popup.css') }}" rel="stylesheet">
    <title> Quản lý truy cập </title>
</head>
@include('aSite.header')

    <div class="home-content">
        <div class="province-box">
            <div class="head">
                <h2>Quản lý truy cập</h2>
                <p>Danh sách {{ $down }}</p>
            </div>
            <div id="notificate">
            </div>
            <div class="tool">
                <div class="button row hidden" id="button_list">
                    <button id="permis_btn" onclick="permis_click()">Cấp quyền</button> 
                    <!-- <button>Hoàn thành</button> -->
                    <button onclick="popup_del()">Xóa</button>
                </div>
                <div class="add_province">
                    <button onclick="add_province()">Thêm {{ $down }}</button>
                </div>
            </div>
            
            <div class="province_list">
                <div class="table">
                    <p>Lịch khai báo và tiến độ điều tra của các tỉnh</p>
                    <form action="" class="search">
                        <div>
                            <input type="text" id="find_name"  placeholder="Nhập tên {{ $down }}">
                        </div>
                        <div>
                            <input type="text" id="find_id" placeholder="Nhập mã {{ $down }}">
                        </div>
                        <div>
                            <button type="submit"><i class="fas fa-search"></i>Tìm kiếm</button>
                        </div>
                    </form>
                    <div class="overflow">
                        <table>
                            <thead>
                                <tr>
                                    <th class="center">
                                        <input type="checkbox" id="check_all" onclick="tick_box_all(this)">
                                    </th>
                                    <th class="center">Mã đăng <br>nhập</th>
                                    <th class="min-width">Tên {{ $down }}</th>
                                    <th class="min-width">Thời gian bắt đầu</th>
                                    <th class="min-width">Thời gian kết thúc</th>
                                    <th class="center">Lịch sử</th>
                                    <th>Tiến độ</th>
                                    <th class="center">Quyền <br> truy cập</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <div>
                                <tbody id="list">

                                @foreach ($local as $local)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="check" onclick="tick_box(this)">  
                                    </td>
                                    <td class="center row_id">{{ $local->id }}</td>
                                    <td class="min-width row_name">{{ $local->name }}</td>
                                    <td class="min-width row_start">{{ $local->start_date.' '.$local->start_time }}</td>
                                    <td class="min-width row_end">{{ $local->end_date.' '.$local->end_time }}</td>
                                    <td class="center"><a onclick="showHistory(this)"><i class="fas fa-history"></i></td>
                                    <td class="progress">
                                        <small class="W-100">90.00%</small>
                                        <div>
                                            <div class="percent"></div>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="switch">
                                    <input type="hidden" id="token6" value="{{ @csrf_token() }}">
                                    <input type="hidden" id="on_url" value="{{ route('admin.on', ['position' => $user->position ]) }}">
                                    <input type="hidden" id="off_url" value="{{ route('admin.off', ['position' => $user->position ]) }}">
                                        @if ($local->status == "Open") 
                                            <input type="checkbox" onclick="onoff(this)" checked>
                                        @else
                                            <input type="checkbox" onclick="onoff(this)">
                                        @endif
                                        
                                        <label><i></i></label>
                                    </div>
                                </td>
                                <td class="tick">
                                    <input type="checkbox" onclick="tick(this)">
                                    <label><i class="fas fa-check"></i></label>
                                </td>
              
                                    <td class="center">
                                        <a onclick="edit_click(this)"><i class="fas fa-edit"></i></a>
                                        <a onclick="popup_del(this)"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>


                                @endforeach
                                
                                
                            </tbody>
                            </div>
                            
                        </table>
                    </div>
                    
                    <div class="bottom">
                        <a href="">Xem thêm</a>
                    </div>
                </div>
            </div>

            <form id="popup" class="popup" action="">
                <input type="hidden" id="token" value="{{ @csrf_token() }}">
                <input type="hidden" id="local_url" value="{{ route('admin.addLocal', ['position' => $user->position ]) }}">
                <div class="popup-content">
                    <div class="title">
                        <p>Thêm {{ $down }}</p>
                    </div>
                    <div class="content">
                        <div>
                            <label for="">Nhập mã {{ $down }} <sup>(*)</sup></label>
                            <input type="text" id="local_id" name="id" placeholder="Nhập mã {{ $down }}"> 
                            <small></small>
                        </div>
                        <div>
                            <label for="">Nhập tên {{ $down }} <sup>(*)</sup></label>
                            <input type="text" id="local_name" name="name" placeholder="Nhập tên {{ $down }}">  
                            <small></small> 
                        </div>
                        <div>
                            <label for="">Cấp mật khẩu <sup>(*)</sup></label>
                            <input type="text" id="local_pass" name="pass" placeholder="Nhập mật khẩu">
                            <small></small>   
                        </div>
                    </div>
                    <div class="btn">
                        <button class="cancel_btn" type="reset" onclick="closePopup()">Hủy bỏ</button>
                        <button class="submit_btn" type="submit" id="submitForm">Cập nhật</button>
                    </div>
                </div>
            </form>

            <form id="capquyen" class="popup" action="">
            <input type="hidden" id="token2" value="{{ @csrf_token() }}">
            <input type="hidden" id="schedule_url" value="{{ route('admin.addSchedule', ['position' => $user->position ]) }}">
                <div class="popup-content">
                    <div class="title">
                        <!-- <span class="close-btn">&times;</span> -->
                        <p>Cấp quyền khai báo</p>
                    </div>
                    <div class="content">
                        <label for="">Thời điểm bắt đầu: </label>
                        <div class="row">
                            <div>
                                <label for="">Chọn giờ <sup>(*)</sup></label>
                                <input type="time" id="start_time">
                                <small></small>
                            </div>
                            <div>
                                <label for="">Chọn ngày <sup>(*)</sup></label>
                                <input type="date" id="start_date">
                                <small id="error-start-date"></small>
                            </div>
                        </div>
                        <label for="">Thời điểm kết thúc: </label>
                        <div class="row">
                            <div>
                                <label for="">Chọn giờ <sup>(*)</sup></label>
                                <input type="time" id="end_time">
                                <small></small>
                            </div>
                            <div>
                                <label for="">Chọn ngày <sup>(*)</sup></label>
                                <input type="date" id="end_date">
                                <small id="error-end-date"></small>
                            </div>
                        </div>
                    </div>
                    <div class="btn">
                        <button class="cancel_btn" type="reset" onclick="closePopup()">Hủy bỏ</button>
                        <button class="submit_btn" type="submit" id="submitForm">Cập nhật</button>
                    </div>
                </div>
            </form>

            <form id="delete" class="popup" action="">
            <input type="hidden" id="token4" value="{{ @csrf_token() }}">
            <input type="hidden" id="delete_url" value="{{ route('admin.deleteLocal', ['position' => $user->position ]) }}">
                <div class="popup-content">
                    <div class="title">
                        <!-- <span class="close-btn">&times;</span> -->
                        <p>Bạn có chắc chắn muốn xóa ?</p>
                        <i class="far fa-question-circle"></i>
                    </div>
                    <div class="content">
                       
                    </div>
                    <div class="btn">
                        <button class="cancel_btn" type="reset" onclick="closePopup()">Hủy bỏ</button>
                        <button id="del_btn" class="submit_btn" type="submit" >Xóa</button>
                    </div>
                </div>
            </form>

            <div id="history" class="popup">
                <div class="popup-content">
                <input type="hidden" id="token5" value="{{ @csrf_token() }}">
                <input type="hidden" id="history_url" value="{{ route('admin.loadHistory', ['position' => $user->position ]) }}">
                    <div id="his-content">
                    </div>
                    <div class="btn">
                        <button class="cancel_btn" type="reset" onclick="closePopup()">Quay lại</button>
                    </div>
                </div>
            </div>
            <form id="edit" class="popup" action="">
                <input type="hidden" id="token3" value="{{ @csrf_token() }}">
                <input type="hidden" id="update_url" value="{{ route('admin.updateLocal', ['position' => $user->position ]) }}">
                <div class="popup-content">
                    <div class="title">
                        Chỉnh sửa
                    </div>
                    <div class="content">
                        <div class="group row">
                            <div class="div-row">
                                <label for="">Mã đăng nhập: </label>
                                <input type="text" id="edit_id" placeholder="Mã đăng nhập" id="provinceCode-reset">
                                <small></small>
                            </div>
                            <div class="div-row">
                                <label for="">Tên tỉnh/tp: </label>
                                <input type="text" id="edit_name" placeholder="Tên {{ $down }}" id="provinceName-reset">
                                <small></small>
                            </div>
                        </div>
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
                        <div class="group">
                           <label for="">Đặt lại mật khẩu: </label>
                           <input type="text" id="password-reset" placeholder="Nhập mật khẩu">
                           <small></small>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="btn">    
                            <button class="cancel_btn" type="reset" onclick="closePopup()">Hủy bỏ</button>
                            <button id="del_btn" class="submit_btn" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </section>
  <script>
      
  </script>
  <script src="{{ asset('js/aSite/js.js')}}"></script>

</body>
</html>

