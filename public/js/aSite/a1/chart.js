
// BIỂU ĐỒ
// Biều đồ thống kê số lượng dân qua các năm
Highcharts.chart('populationIncreaseChart', {
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: 'Biểu đồ thống kê gia tăng dân số từ năm 2000 đến 2020'
    },
    subtitle: {
      text: ''
    },
    xAxis: [{
      categories: ['2000', '2002', '2004', '2006', '2008', '2010',
        '2012', '2014', '2016', '2018', '2020'],
      crosshair: true
    }],
    yAxis: [{ // Primary yAxis
      labels: {
        format: '{value}%',
        style: {
          color: Highcharts.getOptions().colors[1]
        }
      },
      title: {
        text: 'Đơn vị: phần trăm (%)',
        style: {
          color: Highcharts.getOptions().colors[1]
        }
      }
    }, { // Secondary yAxis
      title: {
        text: 'Đơn vị: Triệu người',
        style: {
          color: Highcharts.getOptions().colors[0]
        }
      },
      labels: {
        format: '{value}',
        style: {
          color: Highcharts.getOptions().colors[0]
        }
      },
      opposite: true
    }],
    tooltip: {
      shared: true
    },
    legend: {
      layout: 'vertical',
      align: 'left',
      x: 120,
      verticalAlign: 'top',
      y: 100,
      floating: true,
      backgroundColor:
        Highcharts.defaultOptions.legend.backgroundColor || // theme
        'rgba(255,255,255,0.25)'
    },
    series: [{
      name: 'Dân số ',
      type: 'column',
      yAxis: 1,
      data: [23, 30, 34, 42, 49, 52, 64, 76, 81, 90, 101],
      tooltip: {
        valueSuffix: ' triệu người'
      }
  
    }, {
      name: 'Tỉ lệ gia tăng tự nhiên',
      type: 'line',
      data: [1.1, 4, 3, 3.4, 3.2, 2.5, 2.2, 1.4, 1.3, 1.5, 1.2],
      tooltip: {
        valueSuffix: '%'
      }
    }]
  });
  // --------------------------------------------------------
  /* --Biểu đồ tình hình gia tăng dân số tự nhiên từ 2005-2020-- */
    var bienx = ['2006','2008','2010','2012','2014','2016','2018','2020'];
    var bieny = [32,29,23,23,22,21,20,17];
    var pieChart = document.getElementById('linechart').getContext('2d');
    
    var lineChart = new Chart(pieChart, {
        title: '',
        type: 'line',
        data:{
            labels: bienx,
            datasets:[{
                label: 'Tỉ suất sinh',
                backgroundColor: '#3333cc',
                borderColor: '#3333cc',
                borderWidth: 2,
                pointBorderWidth: 1,
                pointBackgroundColor: '#3333cc',
                pointBorderColor: '#3333cc',
                pointHoverBorderWidth: 3,
                data: bieny
            }, {
              label: 'Tỉ suất tử',
              data: [7,8,5,6,8,7,9,12],
              backgroundColor: '#a70808',
              borderColor: '#a70808',
              borderWidth: 2,
              pointBorderWidth: 1,
              pointBackgroundColor: '#a70808',
              pointBorderColor: '#a70808',
              pointHoverBorderWidth: 3,
            }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        },    
    }) 
  // --------------------------------------------------------
  
      const labelLow = ['2000','2005','2010','2012','2015','2019','2020'];
      const dataLow = {
          labels: labelLow,
          datasets: [{
              label: 'Tốc độ già hóa (%)',
              data: [18, 24, 35, 37, 41, 42, 44],
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
              }
          }
      }
      const chartLow = new Chart(document.getElementById('barchartLow'), configLow);
  // ------------------------------------------------------
  // vùng kinh tế _ vkt 
      const label_vkt = ['Trung du và miền núi  phía Bắc',
      'Đồng bằng sông Hồng','Bắc Trung Bộ và Duyên hải miền Trung',
      'Tây Nguyên','Đông Nam Bộ','Đồng bằng sông Cửu Long'];
      const data_vkt = {
          labels: label_vkt,
          datasets: [{
              label: 'Người',
              data: [12, 22, 20, 56, 13, 42, 10],
              backgroundColor: '#008ae6',
              borderColor: '#008ae6',
              categoryPercentage: 0.6,
          }]
      };
      const config_vkt = {
          type: 'bar',
          data: data_vkt,
          options: {
              indexAxis: 'y',
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      }
      const chart_vkt = new Chart(document.getElementById('ktxh_chart'), config_vkt);
  
  // --------------------------------------------------------------
    var pieChart = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(pieChart, {
        title: '',
        type: 'pie',
        data:{
           labels: [
              'Thành thị',
              'Nông thôn'
            ],
            datasets:[{
              label: 'Người',
              data: [200, 50],
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)'
              ],
              hoverOffset: 4
            }]
        },
    }) 
  
  // -------------------------------------------------------------
  //Biểu đồ cớ cấu dân số theo độ tuổi và giới tính ----->
  
  var categories = [
  '0-4', '5-9', '10-14', '15-19',
  '20-24', '25-29', '30-34', '35-39', '40-44',
  '45-49', '50-54', '55-59', '60-64', '65-69',
  '70-74', '75-79', '80-84', '85 + '
  ];
  
  Highcharts.chart('container', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Cơ cấu dân số theo độ tuổi và giới tính năm 2020'
  },
  subtitle: {
    text: 'Đơn vị: phần trăm'
  },
  accessibility: {
    point: {
      valueDescriptionFormat: '{index}. Age {xDescription}, {value}%.'
    }
  },
  xAxis: [{
    categories: categories,
    reversed: false,
    labels: {
      step: 1
    },
    accessibility: {
      description: 'Age (male)'
    }
  }, { // mirror axis on right side
    opposite: true,
    reversed: false,
    categories: categories,
    linkedTo: 0,
    labels: {
      step: 1
    },
    accessibility: {
      description: 'Age (female)'
    }
  }],
  yAxis: {
    title: {
      text: null
    },
    labels: {
      formatter: function () {
        return Math.abs(this.value) + '%';
      }
    },
    accessibility: {
      description: 'Percentage population',
      rangeDescription: 'Range: 0 to 5%'
    }
  },
  
  plotOptions: {
    series: {
      stacking: 'normal'
    }
  },
  
  tooltip: {
    formatter: function () {
      return '<b>' + this.series.name + ', tuổi ' + this.point.category + '</b><br/>' +
        '2 triệu người, <br> Chiếm: ' + Highcharts.numberFormat(Math.abs(this.point.y), 1) + '%';
    }
  },
  
  series: [{
    name: 'Nam',
    data: [
      -2.2, -2.1, -2.2, -2.4,
      -2.7, -3.0, -3.3, -3.2,
      -2.9, -3.5, -4.4, -4.1,
      -3.4, -2.7, -2.3, -2.2,
      -1.6, -0.6
    ]
  }, {
    name: 'Nữ',
    data: [
      2.1, 2.0, 2.1, 2.3, 2.6,
      2.9, 3.2, 3.1, 2.9, 3.4,
      4.3, 4.0, 3.5, 2.9, 2.5,
      2.7, 2.2, 1.1
    ]
  }]
  });
  // ------------giới tính--------------------------
  var pieChart2000 = document.getElementById('pieChart2000').getContext('2d');
  var pieChart2010 = document.getElementById('pieChart2010').getContext('2d');
  var pieChart2020 = document.getElementById('pieChart2020').getContext('2d');
  const pieLabels = ['Thành thị','Nông thôn'];
  const background = ['rgb(255, 99, 132)','rgb(54, 162, 235)'];
  var data2000 = [200, 50];
  var data2010 = [210, 70];
  var data2020 = [220, 60];
  
  var pieChart = new Chart(pieChart2000, {
      type: 'pie',
      data:{
          labels: pieLabels,
          datasets:[{
            label: 'Người',
            data: data2000,
            backgroundColor: background,
            hoverOffset: 4
          }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            text: 'Năm 2000',
            position:'bottom',
          },
          legend:{
            display:false,
            labels:{
              fontColor:'#000'
            }
          }
        }
      }
  }) 
  var pieChart2 = new Chart(pieChart2010, {
    type: 'pie',
    data:{
        labels: pieLabels,
        datasets:[{
          label: 'Người',
          data: data2000,
          backgroundColor: background,
          hoverOffset: 4
        }]
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Năm 2010',
          position:'bottom',
        },
        legend:{
          display:true,
          position:'top',
          labels:{
            fontColor:'#000'
          }
        }
      }
    }
  }) 
  var pieChart3 = new Chart(pieChart2020, {
    type: 'pie',
    data:{
        labels: pieLabels,
        datasets:[{
          labels: '',
          data: data2000,
          backgroundColor: background,
          hoverOffset: 4
        }]
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Năm 2020',
          position:'bottom',
        },
        legend:{
          display:false,
          labels:{
            fontColor:'#000'
          }
        },
        tooltip: {
          callbacks: {
            // label: function(context) {
            //     let label = context.dataset.label || '';
  
            //     if (label) {
            //         label += ': ';
            //     }
            //     if (context.parsed.y !== null) {
            //         label += new Intl.NumberFormat('en-UTF8', { style: 'currency', currency: 'USD' }).format(context.parsed.y);
            //     }
            //     return label;
            // }
          }
        }
      }
    }
  }) ;
  
  
  // -----------------------------------------------
  //</br> Biểu đồ cơ cấu dân số theo độ tuổi từ năm  
  Highcharts.chart('container2', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Biểu đồ cơ cấu dân số theo độ tuổi từ năm 2000 đến 2020'
  },
  xAxis: {
    categories: ['2000', '2005', '2010', '2015', '2020']
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Đơn vị: nghìn người'
    }
  },
  tooltip: {
    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
    shared: true
  },
  plotOptions: {
    column: {
      stacking: 'percent'
    }
  },
  series: [{
    name: '0-14 tuổi',
    data: [5, 3, 4, 7, 2],
  }, {
    name: '15-60 tuổi',
    data: [2, 2, 3, 2, 1]
  }, {
    name: '60-75 tuổi',
    data: [3, 4, 4, 2, 5]
  }, {
    name: 'Trên 75 tuổi',
    data: [3, 4, 4, 2, 5]
  }]
  });
  
   //Tỷ lệ lực lương lao động theo trình độ học vấn 2010, 2015, 2020 
  
  Highcharts.chart('container3', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Tỷ lệ lực lương lao động theo trình độ học vấn 2010, 2015, 2020'
  },
  subtitle: {
    text: null
  },
  xAxis: {
    categories: ['Tốt nghiệp Đại học trở lên','Tốt nghiệp THPT', 'Tốt nghiệp THCS', 
    'Tốt nghiệp tiểu học', 'Chưa tốt nghiệp tiểu học', 'Chưa bao giờ đi học'],
    title: {
      text: null
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Đơn vị: triệu người',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ' triệu người'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 80,
    floating: true,
    borderWidth: 1,
    backgroundColor:
      Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Năm 2010',
    data: [107, 31, 635, 54, 67, 34]
  }, {
    name: 'Năm 2015',
    data: [133, 156, 947, 45, 34, 56]
  }, {
    name: 'Năm 2020',
    data: [814, 841, 714, 456, 455, 672]
  }]
  });
   
  
  function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Ngành nghề');
      data.addColumn('number', 'Percentage');
      data.addRows([
         ['Cơ khí, Điện, Viễn thông', 45.0],
         ['Du lịch và dịch vụ', 26.8],
         ['Kế toán, Tài chính ngân hàng', 10],
         ['Kinh doanh, Marketing', 8.5],
         ['Kỹ thuật, Công nghệ', 6.2],
         ['Nông-Lâm-Thủy sản', 0.7],
         ['Pháp lý, Hành chính văn phòng', 6.2],
         ['Thủy điện, Xây dựng', 0.7],
         ['Giáo dục, Sư phạm', 0.7],
         ['Y tế', 0.7],
         ['Ngành nghề khác', 0.7]
      ]);
         
      // Set chart options
      var options = {
         'width':700,
         'height':480,
      };
  
      // Instantiate and draw the chart.
      var chart = new google.visualization.PieChart(document.getElementById('container6'));
      chart.draw(data, options);
   }
   google.charts.setOnLoadCallback(drawChart);