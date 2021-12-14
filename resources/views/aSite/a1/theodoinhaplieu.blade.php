@include('aSite/a1.header')
 
    <div class="home-content">
        <h2 style="margin-left: 4%; margin-bottom: 0px; margin-top: 30px; font-weight: 400;" >
        Theo dõi nhập liệu
        </h2>
        <div class="dataEntry">
            <div class="lineChart">
                <p>Dữ liệu tiêm theo ngày</p>
                <canvas id="linechart" style="max-height: 420px;"></canvas>
            </div>
            <div class="barChart">
                <div class="">
                    <h3>10 địa phương có tiến độ điều tra và nhập liệu nhanh nhất</h3>
                    <!-- <span>(Tính đến ngày cập nhật)</span> -->
                    <canvas id="barchartTop"></canvas>
                    <p><span style="font-weight: bold;">Ghi chú:</span>...</p>
                </div>
                <div class="">
                    <h3>10 địa phương có tiến độ điều tra và nhập liệu chậm nhất</h3>
                    <!-- <span>(Tính đến ngày)</span> -->
                    <canvas id="barchartLow"></canvas>
                    <p><span style="font-weight: bold;">Ghi chú:</span> ...</p>
                
                </div>
            </div>
            <div class="provinceChart">
                <p>Theo dõi nhập liệu theo từng tỉnh/ thành phố</p>
                <form class="row" action="">
                    <select type="input" name="province" id="province">
                      <option value="0">Chọn Tỉnh/ TP</option>
                    </select>
                    <div class="btn next_btn">
                      <button type="submit" name="submit"><i class="fas fa-search"></i> Tra cứu</button>
                  </div>
                </form>
                <div class="row">
                    <div style="flex: 3;">
                        <h3 style="margin: 20px 0 0 20px;">Số lượng người được khảo sát cập nhật theo ngày</h3>
                        <span style="margin: 0 20px 0 20px;">Đơn vị: Người</span>
                        <canvas style="max-height: 350px"; id="provinceLineChart"></canvas>
                    </div>
                    <div style="flex: 1;">
                        <canvas style="max-width: 100%; margin-top: 20%;" id="provincePieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

  </section>
  

  <script>
    var bienx = ['24/9','25/9','26/9','27/9','28/9','30/9','1/10','2/10','3/10','4/10','5/10','6/10','7/10','8/10','9/10','10/10','11/10','12/10','13/10','14/10','15/10','16/10','17/10','18/10','19/10','20/10','21/10'];
    var bieny = [50,80,10,10,79,100,34,23,45,78,45,67,30,10,78,56,54,12,34,56,120,150];
    var CHART = document.getElementById('linechart').getContext('2d');
    
    var lineChart = new Chart(CHART, {
        type: 'line',
        data:{
            labels: bienx,
            datasets:[{
                label: 'Số người',
                backgroundColor: '#3333cc',
                borderColor: '#3333cc',
                borderWidth: 2,
                pointBorderWidth: 1,
                pointBackgroundColor: '#b30000',
                pointBorderColor: '#b30000',
                pointHoverBorderWidth: 3,
                data: bieny
            }]
        },
    }) 
//    -----------------------------------------------------     // 
    const labelTop = ['Phú Thọ','Hà Tĩnh','Bình Phước','Cao Bằng','Sơn La','Bạc Liêu',
    'Thái Bình','Điện Biên','Nghệ An','Hà Nội'];
    const data = {
        labels: labelTop,
        datasets: [{
            label: 'Hoàn thành',
            data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80],
            backgroundColor: '#2929a3',
            borderColor: '#2929a3',
            categoryPercentage: 0.6,
        }]
    };
    const configTop = {
        type: 'bar',
        data: data,
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
            legend:{
              display: false,
            }
          }
        }
    }
   
    const chartTop = new Chart(document.getElementById('barchartTop'), configTop);
 // ----------------------------------------------------
    const labelLow = ['Phú Thọ','Hà Tĩnh','Bình Phước','Cao Bằng','Sơn La','Bạc Liêu','Thái Bình','Điện Biên','Nghệ An','Hà Nội'];
    const dataLow = {
        labels: labelLow,
        datasets: [{
            label: 'Hoàn thành',
            data: [65, 59, 52, 61, 56, 55, 53, 55, 56, 50],
            backgroundColor: '#008ae6',
            borderColor: '#008ae6',
            categoryPercentage: 0.6,
        }]
    };
    const configLow = {
        type: 'bar',
        data: dataLow,
        options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
            legend:{
              display: false,
            }
          }
        }
    }
    const chartLow = new Chart(document.getElementById('barchartLow'), configLow);
// ---------------------------------------------------------------------
    var date = ['24/9','25/9','26/9','27/9','28/9','30/9','1/10','2/10','3/10','4/10','5/10','6/10','7/10','8/10','9/10','10/10','11/10','12/10','13/10','14/10','15/10','16/10','17/10','18/10','19/10','20/10','21/10'];
    var y = [50,80,10,10,79,100,34,23,45,78,45,67,30,10,78,56,54,12,34,56,120,150];
    var provinceLineChart = document.getElementById('provinceLineChart').getContext('2d');
    
    var provinceLineChart = new Chart(provinceLineChart, {
        type: 'line',
        data:{
            labels: date,
            datasets:[{
                label: 'Số lượng',
                backgroundColor: '#3333cc',
                borderColor: '#3333cc',
                borderWidth: 2,
                pointBorderWidth: 1,
                pointBackgroundColor: '#b30000',
                pointBorderColor: '#b30000',
                pointHoverBorderWidth: 3,
                data: y
            }]
        },
        options: {
          plugins: {
            legend:{
              display: false,
            }
          }
        }
    });
    // ---------------------------------------------------------
    var provincePieChart = document.getElementById("provincePieChart").getContext("2d");

    var provincePieData = {
        labels: ["Hoàn thành", "Chưa hoàn thành"],
        datasets: [
            {
                label: "",
                backgroundColor: ["#0c267e","#7b7b7c"],
                borderColor: "#bac6dd",
                data: [3,9]
            }
        ]
    };

    var provincePieChart = new Chart(provincePieChart, {
        type: 'pie',
        data: provincePieData,
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
  <script src="{{ asset('js/aSite/a1/js.js')}}"></script>
</body>
</html>

