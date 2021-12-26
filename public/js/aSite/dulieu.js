
// var ctx = document.getElementById("chartData").getContext("2d");

// var data = {
//     labels: ["0-14 tuổi", "15-64 tuổi", "Trên 65 tuổi"],
//     datasets: [
//         {
//             label: "Nam",
//             backgroundColor: "#0d3073",
//             data: [3,9,4]
//         },
//         {
//             label: "Nữ",
//             backgroundColor: "#b90817",
//             data: [4,3,12]
//         }
//     ]
// };

// var myBarChart = new Chart(ctx, {
//     type: 'bar',
//     data: data,
//     options: {
//       plugins: {
//         title: {
//           display: true,
//           text: 'Cơ cấu dân số theo độ tuổi và giới tính',
//           position:'top',
//         },
//         subtitle: {
//             display: true,
//             text: 'Đơn vị: Triệu người'
//         },
//         legend:{
//           display: true,
//           position:'bottom',
//           labels:{
//             fontColor:'#000'
//           }
//         }
//       }
//     },
// });


function find_data() {
  let list = document.querySelectorAll("#ans tr");
  let find_province = document.getElementById('province').value;
  let find_district = document.getElementById('district').value;
  let find_ward = document.getElementById('ward').value;
  let find_citizenName = document.getElementById('citizenName').value;

  for (var i=0; i<list.length; i++) {
    var row_citizenName = list[i].querySelector(".row_citizenName").innerHTML;
    var row_ward = list[i].querySelector(".row_ward").innerHTML;
    var row_district = list[i].querySelector(".row_district").innerHTML;
    var row_province = list[i].querySelector(".row_province").innerHTML;
    
    var province = row_province.indexOf(find_province);
    var district = row_district.indexOf(find_district);
    var ward = row_ward.indexOf(find_ward);
    var citizenName = row_citizenName.indexOf(find_citizenName);
    if (province < 0 || district < 0 || ward < 0 || citizenName < 0) {
      list[i].style.display = 'none';
    }
    else {
      list[i].style.display = 'table-row';
    }
  }
}
document.getElementById('province').addEventListener('keyup', find_data);
document.getElementById('district').addEventListener('keyup', find_data);
document.getElementById('ward').addEventListener('keyup', find_data);
document.getElementById('citizenName').addEventListener('keyup', find_data);


var citizenInfo_form = document.querySelector("#citizen");
window.onclick = function(e){
if(e.target == citizenInfo_form){
  citizenInfo_form.style.display = "none";
}
}

function closePopup(){
  citizenInfo_form.style.display = "none";
}
function view_citizen(self) {
    let row = self.parentNode.parentNode;
    let id = row.querySelector(".citizen_id").innerHTML;

    let url = $("#infoCitizen_url").val();
    $.post(url, {
      '_token': $("#token_ci").val(),
      'id' : id
    }, function(response) {
      document.getElementById('citiInfo-content').innerHTML = "";
      if (response.data) {
          let title = document.createElement('div');
          title.classList.add("title");
          title.innerHTML="<p>Thông tin công dân " + response.data[0]["fullname"] +"</p>" ;
          
          let info = document.createElement('p');
          info.innerHTML = "Ngày sinh: " + response.data[0]["birthdate"] + "  " +  "   Giới tính: " + response.data[0]["gender_name"];

          let cccd = document.createElement('p');
          cccd.innerHTML = "CCCD/CMT: " + response.data[0]["identity_num"] ;

          let dan_toc = document.createElement('p');
          dan_toc.innerHTML = "Dân tộc: " + response.data[0]["ton_giao"] ;

          let address = document.createElement('p');
          address.innerHTML = "Địa chỉ: " + response.data[0]["hometown"] + " " + response.data[0]["address"];

          let temporaryAdd = document.createElement('p');
          temporaryAdd.innerHTML = "Địa chỉ thường trú: " + response.data[0]["temporary_add"] ;

          let level = document.createElement('p');
          level.innerHTML = "Trình độ: " + response.data[0]["level_name"] ;

          let job = document.createElement('p');
          job.innerHTML = "Lĩnh vực làm việc: " + response.data[0]["job_name"] ;

          

          document.getElementById('citiInfo-content').appendChild(title);
          document.getElementById('citiInfo-content').appendChild(info);
          document.getElementById('citiInfo-content').appendChild(cccd);
          document.getElementById('citiInfo-content').appendChild(dan_toc);
          document.getElementById('citiInfo-content').appendChild(address);
          document.getElementById('citiInfo-content').appendChild(temporaryAdd);
          document.getElementById('citiInfo-content').appendChild(level);
          document.getElementById('citiInfo-content').appendChild(job);
      }
      else {
        let p = document.createElement('p');
        p.innerHTML = "Lỗi";
        document.getElementById('citiInfo-content').appendChild(p);
      }
    })
    citizenInfo_form.style.display = "block";
}