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
    <title> document </title>
</head>
@include('aSite.header')

    <div class="home-content">
        <div class="province-box">
            <div class="title">
                <h2>Quản lý truy cập</h2>
                <p>Danh sách tỉnh/thành phố</p>
            </div>
            <div class="add_province">
                <button onclick="add_province()">Thêm tỉnh/thành phố</button>
            </div>
            <form action="">
                <fieldset>
                    <legend>Tìm kiếm: </legend>
                    <div>
                        <input type="text" id="find_name"  placeholder="Nhập tên tỉnh/tp">
                    </div>
                    <div>
                        <input type="text" id="find_id" placeholder="Nhập mã tỉnh/tp">
                    </div>
                    <div>
                        <button type="submit"><i class="fas fa-search"></i>Tìm kiếm</button>
                    </div>
                </fieldset>
            </form>
            <div class="province_list">
                <div class="province_list_top">
                    <div class="button" id="button_list">
                        <button id="permis_btn" onclick="permis_click()">Cấp quyền</button> 
                        <button>Hoàn thành</button>
                        <button onclick="popup_del()">Xóa</button>
                    </div>
                    
                    <div class="pagination">
                        <a href="#">«</a>
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">»</a>
                    </div>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2" class="first">
                                    <input type="checkbox" id="check_all" onclick="tick_box_all(this)">
                                </th>
                                <th rowspan="2" class="nopadding">Mã đăng <br>nhập</th>
                                <th rowspan="2">Tên tỉnh/ thành phố</th>
                                <th colspan="4">Quyền khai báo</th>
                                <th rowspan="2">Sửa</th>
                                <th rowspan="2">Xóa</th>
                            </tr>
                            <tr>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th class="nopadding">Trạng thái</th>
                                <th class="nopadding">Hoàn thành</th>
                            </tr>
                        </thead>
                        <tbody id="list">

                            @foreach ($local as $local)
                            <tr>
                                <td>
                                    <input type="checkbox" class="check" onclick="tick_box(this)">  
                                </td>
                                <td>{{ $local->id }}</td>
                                <td class="left">{{ $local->name }}</td>
                                <td class="left">{{ $local->start }}</td>
                                <td class="left">{{ $local->end }}</td>
                                <td>
                                    <div class="switch">
                                        <input type="checkbox">
                                        <label><i></i></label>
                                    </div>
                                </td>
                                <td class="tick">
                                    <input type="checkbox" onclick="tick(this)">
                                    <label><i class="fas fa-check"></i></label>
                                </td>
                                <td><a onclick="edit_click(this)"><i class="fas fa-edit"></i></a></td>
                                <td><a onclick="popup_del()"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>


                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <form id="popup" class="popup" action="">
                <input type="hidden" id="token" value="{{ @csrf_token() }}">
                <div class="popup-content">
                    <div class="title">
                        <!-- <span class="close-btn">&times;</span> -->
                        <p>Thêm tỉnh hoặc thành phố</p>
                    </div>
                    <div class="content">
                        <div>
                            <label for="">Nhập mã tỉnh/tp <sup>(*)</sup></label>
                            <input type="text" id="local_id" placeholder="Nhập mã tỉnh/tp"> 
                            <small></small>  
                        </div>
                        <div>
                            <label for="">Nhập tên tỉnh/tp <sup>(*)</sup></label>
                            <input type="text" id="local_name" placeholder="Nhập tên tỉnh/tp">  
                            <small></small> 
                        </div>
                        <div>
                            <label for="">Cấp mật khẩu <sup>(*)</sup></label>
                            <input type="text" id="local_pass" placeholder="Nhập mật khẩu">
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
                                <input type="time" id="startTime">
                                <small></small>
                            </div>
                            <div>
                                <label for="">Chọn ngày <sup>(*)</sup></label>
                                <input type="date" id="startDate">
                                <small></small>
                            </div>
                        </div>
                        <label for="">Thời điểm kết thúc: </label>
                        <div class="row">
                            <div>
                                <label for="">Chọn giờ <sup>(*)</sup></label>
                                <input type="time" id="endTime">
                                <small></small>
                            </div>
                            <div>
                                <label for="">Chọn ngày <sup>(*)</sup></label>
                                <input type="date" id="endDate">
                                <small></small>
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
                        <button id="del_btn" class="submit_btn" type="submit" onclick="dell_click(this)">Xóa</button>
                    </div>
                </div>
            </form>
            <form id="edit" class="popup" action="">
                <div class="popup-content">
                    <div class="title">
                    </div>
                    <div class="content">
                        <div class="group row">
                            <div class="div-row">
                                <label for="">Mã đăng nhập: </label>
                                <input type="text" placeholder="Mã đăng nhập" id="provinceCode-reset">
                                <small></small>
                            </div>
                            <div class="div-row">
                                <label for="">Tên tỉnh/tp: </label>
                                <input type="text" placeholder="Tên tỉnh/tp" id="provinceName-reset">
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
  <script src="{{ asset('js/aSite/js.js')}}"></script>

</body>
</html>

