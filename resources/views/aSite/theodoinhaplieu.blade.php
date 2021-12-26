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
                <p>Tiến độ nhập liệu theo ngày</p>
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
  
  <script src="{{ asset('js/aSite/theodoinhaplieu.js')}}"></script>
</body>
</html>

