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
                <div class="user_data">
                    <div class="province_list">
                        <div class="head">
                            <h3>Danh sách lịch khai báo đã tạo</h3>
                        </div>
                        <div class="province_list_top">
                            <button class="delete" onclick="popup_del()">Xóa</button>
                            <div class="pagination">
                                <a href="#">«</a>
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">»</a>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="check_all" onclick="tick_box_all(this)">
                                    </th>
                                    <th>STT</th>
                                    <th>Thời điểm bắt đầu</th>
                                    <th>Thời điểm kết thúc</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="list">
                                <tr>
                                    <td>
                                        <input type="checkbox" class="check" onclick="tick_box(this)">  
                                    </td>
                                    <td>01</td>
                                    <td class="left">hjkj</td>
                                    <td class="left">hgew</td>
                                    <td>
                                        <a onclick="edit_click(this)"><i class="fas fa-eye"></i></a>
                                        <a onclick="edit_click(this)"><i class="fas fa-edit"></i></a>
                                        <a onclick="popup_del()"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Danh sách các tỉnh</h3>
                        <p>Có lịch khai báo từ ngày ... đến ngày ...</p>
                    </div>
                    
                    <div class="todo-list" id="todo-list">
                        <div class="todo-list-top">
                            <p>Tổng: </p>
                            <!-- <button>Thêm tỉnh/tp</button> -->
                        </div>
                        <ul>
                            <li class="title">Tỉnh / Thành phố</li>
                            <li>
                                <p>Thái Bình</p>
                                <i><i class="fas fa-trash-alt"></i></i>
                            </li>
                            <li>
                                <p>Hải Dương</p>
                                <i><i class="fas fa-trash-alt"></i></i>
                            </li>
                        </ul>
                    </div>

            </div>
            
            
            <div class="schedule">
                <div class="head">
                    <h3>Lịch thông báo từ a1</h3>
                </div>
                <div class="province_list_top">
                    <div class="pagination">
                        <a href="#">«</a>
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">»</a>
                    </div>
                </div>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Thời điểm bắt đầu</th>
                        <th>Thời điểm kết thúc</th>
                        <th>Đánh dấu hoàn thành</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            rthfg
                        </td>
                        <td>
                            fdgfdf
                        </td>
                        <td class="tick">
                            <input type="checkbox" onclick="tick(this)">
                            <label><i class="fas fa-check tick-uncheck"></i></label>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            Time
                        </td>
                        <td>
                            Time
                        </td>
                        <td class="tick">
                            <input type="checkbox" onclick="tick(this)">
                            <label><i class="fas fa-check tick-uncheck"></i></label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </section>
  <script src="{{ asset('js/aSite/js.js')}}"></script>

</body>
</html>

