<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     
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
    <link href="{{ asset('css/aSite/bieudophantich.css') }}" rel="stylesheet">
    <title> document </title>
</head>

@include('aSite.header')

    <div class="home-content">
        <div class="top row">
          <div>
            <img src="{{ asset('img/population-growth.jpg')}}" alt="">
          </div>
          <div class="top-right">
            <h1>Phân tích thống kê dữ liệu dân số</h1>
            <div >
              <h1>96 000 000 <span>người</span></h1>
              <p>Dân số Việt Nam tính đến 0 giờ ngày 01 tháng 01 năm 2020</p>
            </div>
          </div>
        </div>
        <div class="chart">
          <figure class="highcharts-figure">
            <div id="populationIncreaseChart"></div>
            <p class="highcharts-description"></p>
          </figure>

          <div class="chart_group row">
            <div class="ppGrowthChart">
              <h3>Biểu đồ tình hình gia tăng dân số tự nhiên từ 2005-2020</h3>
              <span>Đơn vị: phần trăm (%)</span>
              <canvas id="linechart"></canvas>
            </div>
            <div class="populaAgingChart">
              <h3>Biểu đồ tốc độ già hóa dân số qua các năm từ 2000-2020</h3>
              <canvas id="barchartLow"></canvas>
            </div>
          </div>
          <div class="chart_group row">
            <div class="ktxh_chart" style="flex: 3">
              <h3>Quy mô dân số theo 6 vùng kinh tế - xã hội năm 2020</h3>
              <span>Đơn vị: người</span>
              <canvas id="ktxh_chart" style="max-height: 250px;"></canvas>
            </div>
            <div class="" style="flex: 1;">
              <h3>Quy mô dân số theo thành thị và nông thôn năm 2020</h3>
              <canvas id="pieChart" style="max-width: 228px; margin: auto; margin-top: 10px; margin-bottom: 10px;"></canvas>
            </div>
          </div>

          <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description"> </p>
          </figure>
          <div class="pieChartgroup row">
            <div class="title">
              <h1>Tỷ lệ chênh lệch giới tính <br> qua giai đoạn 10 năm</h1>
              <div>
                <img src="{{ asset('img/genderEquality.png')}}" alt="">
              </div>
            </div>
            <div>
              <div class="label">
                <button style="background-color: #5b93e7;"></button> 
                <label>Nam</label>
                <button style="background-color: rgb(211, 102, 157);"></button>
                <label>Nữ </label>
              </div>
              <div class="canvas row">
                <div>
                  <canvas id="pieChart2000"></canvas>
                </div>
                <div>
                  <canvas id="pieChart2010"></canvas>
                </div>
                <div>
                  <canvas id="pieChart2020"></canvas>
                </div>
              </div>
            </div>
            
          </div>

          <figure class="highcharts-figure">
            <div id="container2"></div>
            <p class="highcharts-description"></p>
          </figure>
          <figure class="highcharts-figure">
            <div id="container3"></div>
            <p class="highcharts-description"></p>
          </figure>

          <div class="table">
            <div class="title">
              Tỷ lệ dân số từ 15 tuổi trở lên theo trình độ chuyên môn kỹ thuật, <br>
              giới tính, thành thị, nông thôn và vùng kinh tế - xã hội
            	<p>Đơn vị: phần trăm (%)</p>
            </div>
            
            <table>
              <thead>
                <th></th>
                <th>Tổng số</th>
                <th>Không có trình độ CMKT</th>
                <th>Sơ cấp</th>
                <th>Trung cấp</th>
                <th>Cao đẳng</th>
                <th>Đại học trở lên</th>
              </thead>
              <tbody>
                <tr>
                  <th>TOÀN QUỐC</th>
                  <th>100,0</th>
                  <th>80,0</th>
                  <th>3,0</th>
                  <th>3.5</th>
                  <th>3.3</th>
                  <th>9.3</th>
                </tr>
                <tr>
                  <td>Nam</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <td>Nữ</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <td>Thành thị</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <td>Nông thôn</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <th>Vùng kinh tế - xã hội</th>
                  <th></th> <th></th> <th></th> <th></th> <th></th> <th></th>
                </tr>
                <tr>
                  <td>Trung du và miền núi phía Bắc</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <td>Đồng bằng sông Hồng</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <td>Bắc Trung Bộ và Duyên hải miền Trung</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <td>Tây Nguyên</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <td>Đông Nam Bộ</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
                <tr>
                  <td>Đồng bằng sông Cửu Long</td>
                  <td>100,0</td>
                  <td>79.7</td>
                  <td>3.7</td>
                  <td>3.9</td>
                  <td>3.0</td>
                  <td>9.7</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="line"></div>
          <div class="laborIndustry row">
            <div class="title" style="flex: 2">
              <h1>
                Cơ cấu dân số theo <br> ngành nghề lao động <br> năm 2020
                <br>
                <label>Đơn vị: %</label>
              </h1>
              <div>
                <img src="{{ asset('img/labor.png')}}" alt="">
              </div>
            </div>
            <div style="flex: 3">
              <canvas id="container6"></canvas>
            </div>
          </div>
          
        </div>
    </div>
  </section>
  <script src="{{ asset('js/aSite/js.js')}}"></script>
  <script src="{{ asset('js/aSite/chart.js')}}"></script>
</body>
</html>

