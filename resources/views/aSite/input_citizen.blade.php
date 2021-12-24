<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <link href="{{ asset('css/bSite/input_citizen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aSite/sidebar.css') }}" rel="stylesheet">
    <title>Dữ liệu dân số</title>
</head>
<body>
    @include('aSite.header')

        <div class="home-content">
            <main>
                <div id="declare" class="container">
                    <h5>Khai báo dân số</h5>
                    <div id="dkthongtin">
                        <input type="hidden" id="token1" value="{{ @csrf_token() }}">
                        <input type="hidden" id="test_url" value="{{ route('admin.test', ['position' => $user->position ]) }}">
                        <input type="hidden" id="declare_url" value="{{ route('admin.declare', ['position' => $user->position ]) }}">
                    
                        <!-- <br> -->
                        <div class="ttkhaibao col-4">
                            <label for="fullname">Họ và tên <sup>(*)</sup></label>
                            <input type="text" id="fullname" placeholder="Họ và tên" name="fullname">
                            <small></small>
                        </div>
                        <div class="ttkhaibao col-4">
                            <label for="ngaysinh">Ngày sinh <sup>(*)</sup></label>
                            <input id="ngaysinh" type="date" name="birth_date">
                            <small></small>
                        </div>
                        <div class="ttkhaibao col-4">
                            <label for="gioitinh">Giới tính <sup>(*)</sup></label>
                            <select name="" id="gioitinh" name="gender">
                                <option value="">Giới tính</option>
                                <option value="2">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                            <small></small>
                        </div>
                        <div class="ttkhaibao col-4">
                            <label for="job">Nghề nghiệp <sup>(*)</sup></label>
                            <select name="" id="job">
                                <option value="">Nghề nghiệp</option>
                                <option value="1">Cơ khí, Điện, Viễn thông</option>
                                <option value="2">Du lịch và dịch vụ</option>
                                <option value="3">Kế toán, Tài chính ngân hàng</option>
                                <option value="4">Kinh doanh, Marketing</option>
                                <option value="5">Kỹ thuật, công nghệ</option>
                                <option value="6">Nông-Lâm-Thủy sản</option>
                                <option value="7">Pháp lý, Hành chính văn phòng</option>
                                <option value="8">Thủy điên, Xây dựng</option>
                                <option value="9">Giáo dục, Sư phạm</option>
                                <option value="10">Y tế</option>
                                <option value="11">Ngành nghề khác</option>
                            </select>
                            <small></small>
                        </div>
                        <div class="ttkhaibao col-2">
                            <label for="">Quê quán <sup>(*)</sup></label>
                            <input id="quequan" name="" type="text" placeholder="Quê quán">
                            <small></small>
                        </div>
                        <div class="ttkhaibao col-4">
                            <label for="cccd">Số CMND/CCCD/HC </label>
                            <input id="cccd" name="identity_number" type="number" placeholder="Số CMND/CCCD/HC">
                            <small></small>
                        </div>
                        <div class="ttkhaibao col-4">
                            <label for="">Tôn giáo</label>
                            <input id = "tongiao" type="text" placeholder="Tôn giáo" name="">
                        </div>
                        <div class="ttkhaibao col-4">
                            <label for="">Trình độ văn hóa</label>
                            <select name="" id="level">
                                <option value="">Trình độ văn hóa</option>
                                <option value="1">Chưa bao giờ đi học</option>
                                <option value="2">Chưa tốt nghiệp tiểu học</option>
                                <option value="3">Tốt nghiệp tiểu học</option>
                                <option value="4">Tốt nghiệp THCS</option>
                                <option value="5">Tốt nghiệp THPT</option>
                                <option value="6">Tốt nghiệp đại học trở lên</option>
                            </select>
                        </div>
                        <div class="ttkhaibao col-4">
                            <label for="">Địa chỉ tạm trú</label>
                            <input id="tamtru" type="text" placeholder="Địa chỉ tạm trú" name="">
                        </div>
                        
                        <div class="ttkhaibao col-2">
                            <label for="">Địa chỉ thường trú</label>
                            <input id="thuongtru" type="text" placeholder="Địa chỉ thường trú" name="">
                        </div>

                        <div class="btn btn1" id="btn1">
                            <div class="cancel_btn">
                                <button id="btn_cancel">Hủy bỏ</button>
                            </div>

                            <div class="next_btn">
                                <button id="check" onclick="check()">Kiểm tra</button>

                            </div>
                            <div class="next_btn" id="moveto_medical_history">
                                <button type="button" id="btn1_submit" onclick="declareCtzen()">Khai báo</button>
                        
                            </div> 
                        </div>  
                    </div>
                </div>

                <div id="not_update" class="container">
                    <h5>Danh sách người dân chưa được cập nhật</h5>
                    <div class="user_data">
                        <table>
                            <thead>
                                <tr>
                                    <th class="td_first">Họ tên</th>
                                    <th>Số CMT/CCCD/HC</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody id="registerList">
                                <input type="hidden" id="token" value="{{ @csrf_token() }}">
                                <input type="hidden" id="getOne_url" value="{{ route('admin.getOne', ['position' => $user->position ]) }}">

                                @foreach($citizen as $ctzen)
                                <tr>
                                    <input type="hidden" class="row_id" value="{{ $ctzen->citizen_id }}">
                                    <td class="td_first">
                                        <a onclick="getOne(this)">{{ $ctzen->fullname }}</a>
                                    </td>
                                    <td class='identity_number'>{{ $ctzen->identity_num }}</td>
                                    <td>
                                        <a>
                                            <span class='view'><i class='far'>&#xf2ed;</i></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                

                                
                                
                            </tbody>
                        </table>
                        
                    </div>
                    

                </div>

                <div id="test">
                    Dữ liệu người dân
                    <div id="test-content">

                    </div>
                    <div>
                        <button id="test-close" onclick="close_test()">Đóng</button>
                        <button id="test-apply" onclick="apply()">Áp dụng</button>
                    </div>
                    
                </div>
                <div class="noti" id="confirm">
                    <div class="notifi">
                        <div class="icon">
                            <i class="material-icons">&#xe8fd;</i>
                        </div>
                        <p>Bạn có chắc muốn xóa người dân này</p>
                        <div class="btn-conf">
                            <button onclick="del_cancel()" class="btn-cancel">Hủy</button>
                            <button onclick="del_conf()" class="btn-acc">Xóa</button>
                        </div>

                    </div>
                </div>
            </main>
        </div>

    </section>
    
    <script src="{{ asset('js/bSite/input_citizen.js')}}"></script>
    <script src="{{ asset('js/aSite/js.js')}}"></script>
</body>
</html>