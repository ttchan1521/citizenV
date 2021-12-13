<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/bSite/input_citizen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bSite/header.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dữ liệu dân số</title>
</head>
<body>
    @include('bSite.header')

    <main>
        <div id="declare" class="container">
            <h5>Khai báo dân số</h5>
            <div id="dkthongtin">
               
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
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    <small></small>
                </div>
                <div class="ttkhaibao col-4">
                    <label for="job">Nghề nghiệp <sup>(*)</sup></label>
                    <input id="job" name="job" type="text" placeholder="Nghề nghiệp">
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
                    <input id = "" type="text" placeholder="Tôn giáo" name="">
                </div>
                <div class="ttkhaibao col-4">
                    <label for="">Trình độ văn hóa</label>
                    <input id="" name="" type="text" placeholder="Trình độ văn hóa">
                </div>
                <div class="ttkhaibao col-4">
                    <label for="">Địa chỉ tạm trú</label>
                    <input id="" type="text" placeholder="Địa chỉ tạm trú" name="">
                </div>
                
                <div class="ttkhaibao col-2">
                    <label for="">Địa chỉ thường trú</label>
                    <input id="" type="text" placeholder="Địa chỉ thường trú" name="">
                </div>

                <div class="btn btn1" id="btn1">
                    <div class="cancel_btn">
                        <button id="btn_cancel">Hủy bỏ</button>
                    </div>

                    <div class="next_btn">
                        <button id="check">Kiểm tra</button>

                    </div>
                    <div class="next_btn" id="moveto_medical_history">
                        <button type="button" id="btn1_submit">Khai báo</button>
                   
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
                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_first">
                                <p>Trần Thị Trang</p>
                            </td>
                            <td class='identity_number'>usisls</td>
                            <td>
                                <a>
                                    <span class='view'><i class='far'>&#xf2ed;</i></span>
                                </a>
                            </td>
                        </tr>
        
                        
                        
                    </tbody>
                </table>
                
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
    <footer>

    </footer>

    <script src="{{ asset('js/bSite/input_citizen.js')}}"></script>
</body>
</html>