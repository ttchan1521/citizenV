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
    <title> document </title>
</head>
@include('aSite.header')

    <div class="home-content">
        <h2 style="margin: 30px 0 20px 30px;" >Dữ liệu dân số</h2>
        <div class="search_loca">
            <div class="search-box">
              <form action="" method="POST" id="form">
                <fieldset class="select">
                  <legend>Tìm kiếm: </legend>
                  <select type="input" name="province" id="province">
                      <option value="0">Chọn vùng kt</option>
                  </select>
                  <select type="input" name="province" id="province">
                      <option value="0">Chọn Tỉnh/ TP</option>
                  </select>
                  <select type="input" name="" id="district">
                      <option value="">Chọn Quận/Huyện</option>
                  </select>
                  <select type="input" name="ward" id="ward">
                      <option value="0">Chọn Xã/ Phường</option>
                  </select>
               
                  <input type="text" placeholder="Nhập tên người dân">
                  
                  <div class="btn next_btn">
                      <button type="submit" name="submit"><i class="fas fa-search"></i> Tìm kiếm</button>
                  </div>
                </fieldset>
              </form>

              <div class="data"> 
                <p>Tổng: 100,000,000 người</p>
                <div>
                  <canvas id="chartData"></canvas>
                </div>
              </div>
            </div>
            <div class="table">
              <div class="paging">
                <div><< 1 2 3 4 >></div>
                
              </div>
              <div class="tbl">
                <table class="table">
                  <thead>
                      <tr>
                          <th>STT</th>
                          <th class="setWidth">Họ và tên</th>
                          <th class="setWidth">Xã/Phường</th>
                          <th class="setWidth">Quận/Huyện</th>
                          <th class="setWidth">Tỉnh/TP</th>
                          <th class="setWidth">Chi tiết</th>
                      </tr>
                  </thead>
                  <tbody id="ans">
                      <td>1</td>
                      <td> vu thi yam sjdhs dshfjs</td>
                      <td>ggg</td>
                      <td>ggg</td>
                      <td>ggg</td>
                      <td><button onclick="view_citizen()">Xem</button></td>
                  </tbody>
                </table>
              </div>
            </div>

            <form id="popup" class="popup" action="">
              <div class="info_citizen">
                <h2>Thông tin công dân Vũ Thị Tâm</h2>
              </div>
            </form>
        </div>
    </div>

  </section>
  <script>
    var ctx = document.getElementById("chartData").getContext("2d");

    var data = {
        labels: ["0-14 tuổi", "15-64 tuổi", "Trên 65 tuổi"],
        datasets: [
            {
                label: "Nam",
                backgroundColor: "#0d3073",
                data: [3,9,4]
            },
            {
                label: "Nữ",
                backgroundColor: "#b90817",
                data: [4,3,12]
            }
        ]
    };

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
          plugins: {
            title: {
              display: true,
              text: 'Cơ cấu dân số theo độ tuổi và giới tính',
              position:'top',
            },
            subtitle: {
                display: true,
                text: 'Đơn vị: Triệu người'
            },
            legend:{
              display: true,
              position:'bottom',
              labels:{
                fontColor:'#000'
              }
            }
          }
        },
    });
  </script>
  <script src="{{ asset('js/aSite/js.js')}}"></script>
</body>
</html>

