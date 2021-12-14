@include('aSite/a1.header')

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
            <div class="" style="flex: 1">
              <h3>Quy mô dân số theo thành thị và nông thôn năm 2020</h3>
              <canvas id="pieChart" style="max-width: 228px; margin: auto; margin-top: 10px"></canvas>
            </div>
          </div>

          <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description"> </p>
          </figure>
          <div class="pieChartgroup row">
            <div class="title">
              <h1>Tỷ lệ chênh lệch giới tính <br> qua giai đoạn 10 năm</h1>
              <img src="{{ asset('img/genderEquality.png')}}" alt="">
            </div>
            <div style="margin-top: 35px;">
              <canvas id="pieChart2000" style="max-width: 205px;"></canvas>
            </div>
            <div>
              <canvas id="pieChart2010" style="max-width: 240px"></canvas>
            </div>
            <div  style="margin-top: 35px;">
              <canvas id="pieChart2020" style="max-width: 205px; "></canvas>
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

          <div class="laborIndustry row">
            <div class="title">
              <h1>Cơ cấu dân số theo <br> ngành nghề lao động <br> năm 2020</h1>
              <img src="{{ asset('img/labor.png')}}" alt="">
            </div>
            <div class="chart" id = "container6" style = "margin: auto;"></div>
          </div>
          
        </div>
    </div>
  </section>
  <script src="{{ asset('js/aSite/a1/js.js')}}"></script>
  <script src="{{ asset('js/aSite/a1/chart.js')}}"></script>
</body>
</html>

