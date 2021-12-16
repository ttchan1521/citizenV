@include('aSite/a1.header')

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
                        <input style="margin-left: 30px;" type="text"  placeholder="Nhập tên tỉnh/tp">
                    </div>
                    <div>
                        <input type="text" placeholder="Nhập mã tỉnh/tp">
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
                        <tr>
                            <td>
                                <input type="checkbox" class="check" onclick="tick_box(this)">  
                            </td>
                            <td>01</td>
                            <td class="left">Thái Bình</td>
                            <td class="left">hjkj</td>
                            <td class="left">hgew</td>
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
                            <td><a href=""><i class="fas fa-edit"></i></a></td>
                            <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="check" onclick="tick_box(this)">  
                            </td>
                            <td>01</td>
                            <td class="left">Thái Bình</td>
                            <td class="left">hjkj</td>
                            <td class="left">hgew</td>
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
                            <td><a href=""><i class="fas fa-edit"></i></a></td>
                            <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" class="check" onclick="tick_box(this)">  
                            </td>
                            <td>01</td>
                            <td class="left">Thái Bình</td>
                            <td class="left">hjkj</td>
                            <td class="left">hgew</td>
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
                            <td><a href=""><i class="fas fa-edit"></i></a></td>
                            <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>

            <form id="popup" class="popup" action="">
                <div class="popup-content">
                    <div class="title">
                        <!-- <span class="close-btn">&times;</span> -->
                        <p>Thêm tỉnh hoặc thành phố</p>
                    </div>
                    <div class="content">
                        <div>
                            <label for="">Nhập mã tỉnh/tp <sup>(*)</sup></label>
                            <input type="text" placeholder="Nhập mã tỉnh/tp">   
                        </div>
                        <div>
                            <label for="">Nhập tên tỉnh/tp <sup>(*)</sup></label>
                            <input type="text" placeholder="Nhập tên tỉnh/tp">   
                        </div>
                        <div>
                            <label for="">Cấp mật khẩu <sup>(*)</sup></label>
                            <input type="text" placeholder="Nhập mật khẩu">   
                        </div>
                    </div>
                    <div class="btn">
                        <button class="cancel_btn" type="reset" onclick="closePopup()">Hủy bỏ</button>
                        <button class="submit_btn" type="submit">Cập nhật</button>
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
                                <input type="time">
                            </div>
                            <div>
                                <label for="">Chọn ngày <sup>(*)</sup></label>
                                <input type="date">
                            </div>
                        </div>
                        <label for="">Thời điểm kết thúc: </label>
                        <div class="row">
                            <div>
                                <label for="">Chọn giờ <sup>(*)</sup></label>
                                <input type="time">
                            </div>
                            <div>
                                <label for="">Chọn ngày <sup>(*)</sup></label>
                                <input type="date">
                            </div>
                        </div>
                    </div>
                    <div class="btn">
                        <button class="cancel_btn" type="reset" onclick="closePopup()">Hủy bỏ</button>
                        <button class="submit_btn" type="submit">Cập nhật</button>
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
            
        </div>
    </div>
  </section>
  <script src="{{ asset('js/aSite/a1/js.js')}}"></script>

</body>
</html>

