<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
     
     <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
    </script>
    <script type = "text/javascript">
       google.charts.load('current', {packages: ['corechart','line']});  
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
    <link href="{{ asset('css/aSite/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aSite/dulieu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aSite/popup.css') }}" rel="stylesheet">
    <title> document </title>
</head>
@include('aSite.header')

    <div class="home-content">
        <h2 style="margin: 30px 0 20px 30px;" >Dữ liệu dân số</h2>
        <div class="search_loca">
            <div class="search-box">
              <form action="" method="POST" id="form">
               
                <fieldset class="select" id="search">
                  <legend>Tìm kiếm: </legend>
                  <!-- <select type="input" name="province" id="province">
                      <option value="" >Chọn Tỉnh/ TP</option>
                      
                  </select> -->
                  <!-- <select type="input" name="" id="district">
                      <option value="" id="find_district">Chọn Quận/Huyện</option>
                  </select>
                  <select type="input" name="ward" id="ward">
                      <option value="" id="find_ward">Chọn Xã/ Phường</option>
                  </select>
                -->
                 
                                           
                @if ( $position == "a3" || $position == "a2" || $position=="b1")                        
                  <input type="text" id="province" style="display:none" placeholder="Nhập Tỉnh/tp">
                @else <input type="text" id="province" placeholder="Nhập Tỉnh/tp">
                @endif

                @if ( $position == "a3" || $position=="b1" )  
                  <input type="text" id="district" style="display:none" placeholder="Nhập Quận/huyện">
                @else 
                  <input type="text" id="district" placeholder="Nhập Quận/huyện"> 
                @endif

                @if ( $position=="b1" )
                  <input type="text" id="ward" style="display:none" placeholder="Nhập Xã/phường">
                @else 
                  <input type="text" id="ward" placeholder="Nhập Xã/phường">
                @endif  

                  <input type="text" id="citizenName" placeholder="Nhập tên người dân">  
               
                    
                  <div class="btn next_btn">
                      <button type="submit" name="submit"><i class="fas fa-search"></i> Tìm kiếm</button>
                  </div>
                </fieldset>
              </form>

              <!-- <div class="data"> 
                <p>Tổng: 10 người</p>
                <div>
                  <canvas id="chartData"></canvas>
                </div>
              </div> -->
            </div>
            <div class="table">
              <div class="paging">
                <div class="pagination">
                  <a href="#">&#171;</a>
                  <a href="#" class="active">1</a>
                  <a href="#">2</a>
                  <a href="#">3</a>
                  <a href="#">&#187;</a>
                </div>
              </div>
              <div class="tbl">
                <table>
                  <thead>
                      <tr>
                        @if ($position == "a1") 
                          <th>STT</th>
                          <th class="setWidth">Họ và tên</th>
                          <th class="setWidth">Xã/Phường</th>
                          <th class="setWidth">Quận/Huyện</th>
                          <th class="setWidth">Tỉnh/TP</th>
                          <th>Chi tiết</th>
                        @elseif ($position == "a2") 
                          <th>STT</th>
                          <th class="setWidth">Họ và tên</th>
                          <th class="setWidth">Xã/Phường</th>
                          <th class="setWidth">Quận/Huyện</th>
                          <th>Chi tiết</th>
                        @elseif ($position == "a3") 
                          <th>STT</th>
                          <th class="setWidth">Họ và tên</th>
                          <th class="setWidth">Xã/Phường</th>
                          <th>Chi tiết</th>
                        @elseif ($position == "b1") 
                          <th>STT</th>
                          <th class="setWidth">Họ và tên</th>
                          <th>Chi tiết</th>
                        @endif
                      </tr>
                  </thead>
                
                  <tbody id="ans">
                      @php
                        $stt = 0;
                      @endphp
                      @foreach ($citizen as $citizen)
                      <tr>
                        <td>{{ $stt++ }}</td>
                        <td class="citizen_id" style="display:none">{{ $citizen->citizen_id }}</td>
                        
                        <!-- <input  type="hidden" value=""></input> -->
                        <td class="row_citizenName"> {{ $citizen->fullname }}</td>

                      @if ($position == "b1")  
                        <td class="row_ward" style="display: none">{{ $citizen->Xa }}</td>
                      @else 
                      <td class="row_ward">{{ $citizen->Xa }}</td>
                      @endif

                      @if ( $position == "a3" || $position == "b1") 
                        <td class="row_district" style="display: none">{{ $citizen->Huyen }}</td>
                      @else
                        <td class="row_district">{{ $citizen->Huyen }}</td>
                      @endif

                      @if ($position == "a2" || $position == "a3" || $position == "b1")
                        <td class="row_province" style="display: none">{{ $citizen->Tinh }}</td>
                      @else 
                        <td class="row_province" >{{ $citizen->Tinh }}</td>
                      @endif
                        <td class=""><button onclick="view_citizen(this)">Xem</button></td>
                      
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <form id="citizen" class="popup" action="" >
              <input type="hidden" id="token_ci" value="{{ @csrf_token() }}">
              <input type="hidden" id="infoCitizen_url" value="{{ route('admin.load_InfoCitizen', ['position' => $user->position ]) }}">
              <div class="popup-content" >
                  <div class="content" id="citiInfo-content">
                     
                  </div> 

                  <div class="btn">
                      <button class="cancel_btn" type="reset" onclick="closePopup()">Đóng</button>
                  </div>
              </div>
            </form>
        </div>
    </div>

  </section>
  <script src="{{ asset('js/aSite/dulieu.js')}}"></script>
</body>
</html>

