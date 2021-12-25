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
    <link href="{{ asset('css/aSite/theodoinhaplieu.css') }}" rel="stylesheet">
    <title> document </title>
</head>
@include('aSite.header')
 
    <div class="home-content">
        <p>Theo dõi nhập liệu</p>
        <div class="dataEntry">
            <div class="chart lineChart">
                <p>Dữ liệu tiêm theo ngày</p>
                <canvas id="linechart" style="max-height: 420px;"></canvas>
            </div>
            <div class="chart barChart">
                <div class="">
                    <p>10 địa phương có tiến độ điều tra và nhập liệu nhanh nhất<p>
                    <canvas id="barchartTop"></canvas>
                </div>
                <div class="">
                    <p>10 địa phương có tiến độ điều tra và nhập liệu chậm nhất<p>
                    <canvas id="barchartLow"></canvas>
                </div>
            </div>
            <div class="chart provinceChart">
                <p>Theo dõi nhập liệu theo từng tỉnh/ thành phố</p>
                <form class="row" action="">
                    <input type="hidden" id="token" value="{{ @csrf_token() }}">
                    <input type="hidden" id="each_url" value="{{ route('admin.updateChart', ['position' => $user->position ]) }}">
                    <select type="input" name="province" id="province">
                      <option value="0">Chọn Tỉnh/ TP</option>
                      @foreach($locals as $local)
                        <option value="{{ $local->id }}">{{ $local->name }}</option>
                      @endforeach
                    </select>
                    <div class="btn next_btn">
                      <button type="submit" name="submit"><i class="fas fa-search"></i> Tra cứu</button>
                  </div>
                </form>
                <div class="prvChart">
                    <div>
                        <p>Số lượng người được khảo sát cập nhật theo ngày</p>
                        <span>Đơn vị: Người</span>
                        <canvas style="max-height: 350px"; id="provinceLineChart"></canvas>
                    </div>
                    <div>
                        <canvas id="provincePieChart"></canvas>
                    </div>
                </div>

                <input type="hidden" value="{{ json_encode($time) }}" id ="getpro">
                <input type="hidden" value="{{ json_encode($data) }}" id="getpro1">
                <input type="hidden" value="{{ json_encode($fast) }}" id="fast">
                <input type="hidden" value="{{ json_encode($slow) }}" id="slow">
                <input type="hidden" value="{{ $total }}" id="total">
                <input type="hidden" value="{{ $done }}" id="done">
            </div>
        </div>
        
    </div>

  </section>
  

  <script>
    let pro = document.getElementById("getpro").value;
    pro = JSON.parse(pro);
    let pro1 = document.getElementById("getpro1").value;
    pro1 = JSON.parse(pro1);
    var bienx = pro;
    var bieny = pro1;
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

    let fast = document.getElementById("fast").value;
    fast = JSON.parse(fast);
    let local_f = [];
    let data_f = [];
    for (var i=0; i<fast.length; i++) {
        local_f.push(fast[i]["local_name"]);
        data_f.push(fast[i]["total"]);
    } 
    
    const labelTop = local_f;
    const data = {
        labels: labelTop,
        datasets: [{
            label: 'Hoàn thành',
            data: data_f,
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

    let slow = document.getElementById("slow").value;
    slow = JSON.parse(slow);
    let local_s = [];
    let data_s = [];
    for (var i=0; i<slow.length; i++) {
        local_s.push(slow[i]["local_name"]);
        data_s.push(slow[i]["total"]);
    } 
    const labelLow = local_s;
    const dataLow = {
        labels: labelLow,
        datasets: [{
            label: 'Hoàn thành',
            data: data_s,
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

    let selector = document.getElementById("province");
    let tinh = selector.value;

    let total = document.getElementById("total").value;
    let done = document.getElementById("done").value;
    

    var date = pro;
    var y = pro1;
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
                data: [done,total-done]
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
              text: 'Tiến độ',
              position:'top',
            },
            subtitle: {
                display: true,
                text: 'Đơn vị: Người'
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

    //Thay đổi, chọn các địa phương
    $("#province").on('change', function() {
        let selectPro = this.value;
        let selectTotal = total;
        let selectDone = done;
        let selectTime = pro;
        let selectData = pro1;
        if (selectPro != '0') {
            let url = $("#each_url").val();
            $.post(url, {
                '_token' : $("#token").val(),
                'id' : selectPro
            }, function(response) {
                if (response.success) {
                    selectTotal = response.total;
                    selectDone = response.done;
                    selectTime = response.time;
                    selectData = response.data;
                    updateChart(selectTotal, selectDone, selectTime, selectData);
                }
            });
            
        }
        else {
            updateChart(selectTotal, selectDone, selectTime, selectData);
        }
    });

    function updateChart(SelectTotal, SelectDone, SelectTime, SelectData) {
        provinceLineChart.data.label = SelectTime;
        provinceLineChart.data.datasets[0].data = SelectData;
        provinceLineChart.update();

        provincePieChart.data.datasets[0].data = [SelectTotal,SelectTotal-SelectDone];
        provincePieChart.update();


    }
  </script>
</body>
</html>

