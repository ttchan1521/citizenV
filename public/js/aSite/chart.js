
// BIỂU ĐỒ
// Biều đồ thống kê số lượng dân qua các năm
let year = document.getElementById("year").value;
year = JSON.parse(year);
let data = document.getElementById("data").value;
data = JSON.parse(data);

let sinh = document.getElementById("sinh").value;
sinh = JSON.parse(sinh);
let tu = document.getElementById("tu").value;
tu = JSON.parse(tu);

let tile1 = [0.7, 4.0, 4.0, 4.7, 3.0, -4.0, 4.7, 4.3, -6.0, -3.3];
let tile = [];
for (var i=0; i<sinh.length; i++) {
  let rate = (sinh[i]-tu[i])/data[0]*100 + 4;
  rate = rate.toFixed(1);
  tile.push(rate);
}

let ccNam = document.getElementById("ccnam").value;
ccNam = JSON.parse(ccNam);
let ccNu = document.getElementById("ccNu").value;
ccNu = JSON.parse(ccNu);

let male = document.getElementById("male").value;
male = JSON.parse(male);

let female = document.getElementById("female").value;
female = JSON.parse(female);

let young = document.getElementById("young").value;
young = JSON.parse(young);
let work = document.getElementById("work").value;
work = JSON.parse(work);
let old = document.getElementById("old").value;
old = JSON.parse(old);


let level0 = document.getElementById("level0").value;
level0 = JSON.parse(level0);
let level1 = document.getElementById("level1").value;
level1 = JSON.parse(level1);
let level2 = document.getElementById("level2").value;
level2 = JSON.parse(level2);
let level3 = document.getElementById("level3").value;
level3 = JSON.parse(level3);
let level4 = document.getElementById("level4").value;
level4 = JSON.parse(level4);
let level5 = document.getElementById("level5").value;
level5 = JSON.parse(level5);

let job = document.getElementById("job").value;
job = JSON.parse(job);

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
    categories: year,
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
      text: 'Đơn vị: Người',
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
    data: data,
    tooltip: {
      valueSuffix: ' người'
    }

  }, {
    name: 'Tỉ lệ gia tăng tự nhiên',
    type: 'line',
    data: tile1,
   
    tooltip: {
      valueSuffix: '%'
    }
  }]
});
// --------------------------------------------------------
/* --Biểu đồ tình hình gia tăng dân số tự nhiên từ 2005-2020-- */
  var bienx = year;
  var bieny = sinh;
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
            data: tu,
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
  data: ccNam
}, {
  name: 'Nữ',
  data: ccNu
}]
});
// ------------giới tính--------------------------
var pieChart2000 = document.getElementById('pieChart2000').getContext('2d');
var pieChart2010 = document.getElementById('pieChart2010').getContext('2d');
var pieChart2020 = document.getElementById('pieChart2020').getContext('2d');
const pieLabels = ['Nam','Nữ'];
const background = ['#5b93e7','rgb(211, 102, 157)'];
var data2000 = [male[0], female[0]];
var data2010 = [male[5], female[5]];
var data2020 = [male[9], female[9]];

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
          text: 'Năm ' + year[0],
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
        data: data2010,
        backgroundColor: background,
        hoverOffset: 4
      }]
  },
  options: {
    plugins: {
      title: {
        display: true,
        text: 'Năm ' + year[5],
        position:'bottom',
      },
      legend:{
        display: false,
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
        data: data2020,
        backgroundColor: background,
        hoverOffset: 4
      }]
  },
  options: {
    plugins: {
      title: {
        display: true,
        text: 'Năm ' +year[9],
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
  categories: [year[1], year[3], year[5], year[7], year[9]]
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
  data: [young[1], young[3], young[5], young[7], young[9]],
}, {
  name: '15-60 tuổi',
  data: [work[1], work[3], work[5], work[7], work[9]]
},  {
  name: 'Trên 60 tuổi',
  data: [old[1], old[3], old[5], old[7], old[9]]
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
  name: 'Năm ' + year[1],
  data: [level5[1], level4[1], level3[1], level2[1], level1[1], level0[1]]
}, {
  name: 'Năm ' + year[5],
  data: [level5[5], level4[5], level3[5], level2[5], level1[5], level0[5]]
}, {
  name: 'Năm ' + year[9],
  data: [level5[9], level4[9], level3[9], level2[9], level1[9], level0[9]]
}]
});
 
var pieChartCareer = document.getElementById('container6').getContext('2d');
const careerLabels = ['Cơ khí, Điện, Viễn thông','Du lịch và dịch vụ',
                  'Kế toán, Tài chính ngân hàng','Kinh doanh, Marketing',
                  'Kỹ thuật, Công nghệ','Nông-Lâm-Thủy sản',
                  'Pháp lý, Hành chính văn phòng','Thủy điện, Xây dựng',
                  'Giáo dục, Sư phạm','Y tế','Ngành nghề khác'];
const backgroundc = ['#5b93e7','rgb(211, 102, 157)','red','blue', 
'#5b93e7','rgb(211, 102, 157)','red','blue',
'#5b93e7','rgb(211, 102, 157)','red'];
var careerData = job;

var CareerChart = new Chart(pieChartCareer, {
    type: 'pie',
    data:{
        labels: careerLabels,
        datasets:[{
          label: 'Người',
          data: careerData,
          backgroundColor: backgroundc,
          hoverOffset: 4
        }]
    },
    options: {
      plugins: {
        title: {
          display: false,
        },
        legend:{
          display: true,
          position: 'right',
          labels:{
            fontColor:'#000'
          }
        }
      }
    }
}) 