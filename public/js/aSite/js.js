
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
      let arrowParent = e.target.parentElement.parentElement;
      arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  });

// trang phanquyen

var addProvince = document.querySelector(".province-box #popup");
var addSchedule = document.querySelector(".province-box #capquyen");
var delete_btn = document.querySelector(".province-box #delete");
var edit_data = document.querySelector(".province-box #edit");
var history_box = document.querySelector("#history");

console.log(history_box);

function add_province(){
  addProvince.style.display = "block";
}
function permis_click(self){
  addSchedule.style.display = "block";
}

let row;
let id;
function edit_click(self) {
  row = self.parentNode.parentNode;
  let id = row.querySelector(".row_id").innerHTML;
  let name = row.querySelector(".row_name").innerHTML;
  edit_data.querySelector("#edit_id").value = id;
  edit_data.querySelector("#edit_id").disabled = true;
  edit_data.querySelector("#edit_name").value = name;

  let start = row.querySelector(".row_start").innerHTML;
  let end = row.querySelector(".row_end").innerHTML;
  start = start.split(" ");
  end = end.split(" ");

  edit_data.querySelector("#startDate-reset").value = start[0];
  edit_data.querySelector('#startTime-reset').value = start[1];
  edit_data.querySelector('#endDate-reset').value = end[0];
  edit_data.querySelector('#endTime-reset').value = end[1];
  edit_data.style.display = "block";

}
window.onclick = function(e){
  if(e.target == addProvince || e.target == addSchedule 
    || e.target == delete_btn || e.target == edit_data || e.target == history_box){
    addProvince.style.display = "none";
    addSchedule.style.display = "none";
    delete_btn.style.display = "none";
    edit_data.style.display = "none";
    history_box.style.display = "none";
  }
}

function closePopup(){
  addSchedule.style.display = "none";
  addProvince.style.display = "none";
  delete_btn.style.display = "none";
  edit_data.style.display = "none";
  history_box.style.display = "none";
}
function popup_del(self){
  row = self.parentNode.parentNode;
  id = row.querySelector(".row_id").innerHTML;
  delete_btn.style.display = "block";

}     

function view_citizen(){
  var popup = document.querySelector(".search_loca .popup");
  popup.style.display = "block";
}

function tick_box(self){
  let check_all_btn = document.getElementById("check_all");
  let dell = document.getElementById("button_list");
  if(self.checked == true){
      self.parentNode.parentNode.classList.add("checked");
      dell.style.visibility = "visible";
  }
  else {
      self.parentNode.parentNode.classList.remove("checked");
      check_all_btn.checked = false;
  }

  let check_rows = document.getElementsByClassName("check");
  let check_all = true;
  let uncheck_all = true; 

  for(let i = 0; i<check_rows.length; i++){
      if (check_rows[i].checked == false){
          check_all = false;
      }
      else {
          uncheck_all = false;
      }
  }
  if (check_all == true) {
      check_all_btn.checked = true;
  }
  if (uncheck_all == true ){
      dell.style.visibility = "hidden";
  }
  
}

function tick_box_all(self) {
  let del = document.getElementById("button_list");
  let rows = document.getElementsByClassName("check");
  if (rows.length == 0) {
      self.checked = false;
      del.style.visibility = "hidden";
      return;
  }
  if (self.checked == true) {
      del.style.visibility = "visible";
      for (let i = 0; i < rows.length; i++) {
          rows[i].checked = true;
          rows[i].parentNode.parentNode.classList.add("checked");
      }
  } else {
      del.style.visibility = "hidden";
      for (let i = 0; i < rows.length; i++) {
          rows[i].checked = false;
          rows[i].parentNode.parentNode.classList.remove("checked");
      }
  }

}
function tick(self){
  if(self.checked == true){
      self.nextElementSibling.childNodes[0].classList.add("tick-background");
  } else {
      self.nextElementSibling.childNodes[0].classList.remove("tick-background");
  }
}

function showHistory(self) {
  let row = self.parentNode.parentNode;
  let id = row.querySelector(".row_id").innerHTML;
  let url = $("#history_url").val();
  $.post(url, {
    '_token': $("#token5").val(),
    'id' : id
  }, function(response) {
    document.getElementById('his-content').innerHTML = "";
    if (response.data) {
  
      for (var i=0; i<response.data.length; i++) {
        let title = document.createElement('div');
        title.innerHTML="<p>Lịch sử khai báo</p>";
        let sche = document.createElement('h1');
        sche.innerHTML = response.data[i]["start_date"] + " " + response.data[i]["start_time"] + response.data[i]["end_date"] + response.data[i]['end_time'] + response.data[i]["status"];
        
        document.getElementById('his-content').appendChild(sche);
        document.getElementById('his-content').appendChild(title);
      }
    }
    else {
      // document.createElement('div').innerHTML = "";
      let p = document.createElement('p');
      p.innerHTML = "Chưa có lịch khai báo nào!";
      document.getElementById('his-content').appendChild(p);
    }
  })
  history_box.style.display = "block";
}

function addLocal(id, name) {
  let row = document.createElement('tr');
  let col1 = document.createElement('td');
  col1.innerHTML = "<input type='checkbox' class='check' onclick='tick_box(this)'>";
  

  let col2 = document.createElement('td');
  col2.classList.add("row_id");
  col2.classList.add("center");
  col2.innerHTML = id;

  let col3 = document.createElement('td');
  col3.innerHTML = name;
  col3.classList.add('min-width');
  col3.classList.add("row_name");

  let col4 = document.createElement('td');
  col4.classList.add('min-width');
  col4.classList.add('row_start');
  let col5 = document.createElement('td');
  col5.classList.add('min-width');
  col5.classList.add('row_end');

  let col6 = document.createElement('td');
  col6.innerHTML = '<a ><i class="fas fa-history"></i>';
  col5.classList.add('center');

  // let col7 = document.createElement('td');
  // col7.innerHTML = '<input type="checkbox" onclick="tick(this)"><label><i class="fas fa-check"></i></label>';
  // col7.classList.add('tick');
  let col7 = document.createElement('td');
  col7.innerHTML = '<small class="W-100">90.00%</small><div><div class="percent"></div></div>';
  col7.classList.add('progress');

  let col8 = document.createElement('td');
  col8.innerHTML = '<div class="switch"><input type="checkbox"><label><i></i></label></div>';
  
  let col9 = document.createElement('td');
  col9.innerHTML = '<a onclick="edit_click(this)"><i class="fas fa-edit"></i></a>';
  col9.innerHTML = '<a onclick="popup_del()"><i class="fas fa-trash-alt"></i></a>';
  col5.classList.add('center');

  row.appendChild(col1);
  row.appendChild(col2);
  row.appendChild(col3);
  row.appendChild(col4);
  row.appendChild(col5);
  row.appendChild(col6);
  row.appendChild(col7);
  row.appendChild(col8);
  row.appendChild(col9);
  

  document.getElementById('list').appendChild(row);
  

}

function clear() {
  let del = document.getElementById("button_list");
  let rows = document.getElementsByClassName("check");
  let all = document.getElementById("check_all");

  all.checked = false;
  del.style.visibility = "hidden";
  for (let i = 0; i < rows.length; i++) {
    rows[i].checked = false;
    rows[i].parentNode.parentNode.classList.remove("checked");
  }
}
function tick(self){
  if(self.checked == true){
      self.nextElementSibling.childNodes[0].classList.add("tick-background");
  } else {
      self.nextElementSibling.childNodes[0].classList.remove("tick-background");
  }
}

function onoff(self) {
  let id = self.parentNode.parentNode.parentNode.querySelector(".row_id").innerHTML;
  console.log(id);
  if (self.checked == true) {
    url = $("#on_url").val();
  }
  else {
    url = $("#off_url").val();
  }

  $.post(url, {
    '_token': $("#token6").val(),
    'id' : id
  }, function (response) {

  });
}


function openNotify(){
  document.getElementById("notificate").style.display = "block";
}
function del(self){
  self.parentNode.style.display="none";
}
$(document).ready(function() {
  $('#popup').submit(function(e) {
    e.preventDefault();

    let id = $('#local_id').val();
    let name = $('#local_name').val();
    let url = $("#local_url").val();

    $.post(url, {
      '_token': $("#token").val(),
      'id': id,
      'name': name,
      'password': $('local_pass').val()
    }, function (response) {
        if (response.success) {
          $('#notificate').html("<button onclick='del(this)'><i class='fas fa-times-circle'></i></button><p class='message'>Thêm thành công!</p>");
          openNotify();
          $('#notificate').fadeOut(5000); 
          closePopup();
          addLocal(id, name);
        }
        else {
          alert('Thêm không thành công');
        }

    });

  });

  $("#capquyen").submit(function(e) {
    e.preventDefault();
    let list = document.querySelectorAll("input.check");
    let checks = [];
    let local = [];
    for (var i=0; i<list.length; i++) {
      if (list[i].checked == true) {
        local.push(list[i].parentNode.parentNode);
        checks.push(list[i].parentNode.parentNode.querySelector(".row_id").innerHTML);
      }
    }

    let start_time = $("#start_time").val();
    let start_date = $("#start_date").val();
    let end_time = $("#end_time").val();
    let end_date = $("#end_date").val();

    let url = $("#schedule_url").val();

    $.post(url, {
      '_token': $("#token2").val(),
      'start_time': start_time,
      'start_date' : start_date,
      'end_time' : end_time,
      'end_date': end_date,
      'local' : checks

    }, function(response) {
      if (response.success) {
        $('#notificate').html("<button onclick='del(this)'><i class='fas fa-times-circle'></i></button><p class='message'>Thêm lịch khai báo thành công!</p>");
        openNotify();
        $('#notificate').fadeOut(5000); 
        closePopup();
        for (var i=0; i<local.length; i++) {

          local[i].querySelector(".row_start").innerHTML = start_date + " " + start_time + ":00";
          local[i].querySelector(".row_end").innerHTML = end_date + " " + end_time + ":00";
          local[i].querySelector(".switch input").checked = true;
          clear();
          
        }
      } else {
          if (response.msg_start_date != '') {
              $('#error-start-date').text(response.msg_start_date);
          } else {
            $('#error-start-date').text('');
          }
          if (response.msg_end_date != '') {
    
            $('#error-end-date').text(response.msg_end_date);
          } else {
            $('#error-end-date').text('');
        }
      }
    });


  });

  $("#edit").submit(function(e) {
    e.preventDefault();

    let id = $("#edit_id").val();
    let name = $("#edit_name").val();
    let start_date = $("#startDate-reset").val();
    let start_time = $("#startTime-reset").val();
    let end_date = $("#endDate-reset").val();
    let end_time = $("#endTime-reset").val();

    let password = $("#password-reset").val();
    if (password == "") {
      password = false;
    }

    let url = $("#update_url").val();

    $.post(url, {
      '_token': $("#token3").val(),
      'id' : id,
      'name': name,
      'start_date' : start_date,
      'start_time' : start_time,
      'end_date' : end_date,
      'end_time' : end_time,
      'password' : password
    }, function(response) {
      if (response.success) {
        $('#notificate').html("<button onclick='del(this)'><i class='fas fa-times-circle'></i></button><p class='message'>Cập nhật thành công!</p>");
        openNotify();
        $('#notificate').fadeOut(5000); 
        closePopup();
        row.querySelector(".row_name").innerHTML = name;
        row.querySelector(".row_start").innerHTML = start_date + " " + start_time;
        row.querySelector(".row_end").innerHTML = end_date + " " + end_time;
      }
    })
  });

  $("#delete").submit(function(e) {
    e.preventDefault();

    let url = $("#delete_url").val();
    $.post(url, {
      '_token': $("#token4").val(),
      'id' : id
    }, function(response) {
      if (response.success) {
        $('#notificate').html("<button onclick='del(this)'><i class='fas fa-times-circle'></i></button><p class='message'>Xóa thành công!</p>");
        openNotify();
        $('#notificate').fadeOut(5000); 
        closePopup();
        row.remove();
      }
    });
  });
  
});

function find() {
  let list = document.querySelectorAll("#list tr");
  let target_name = document.getElementById('find_name').value;
  let target_id = document.getElementById('find_id').value;
  for (var i=0; i<list.length; i++) {
    var id = list[i].querySelector(".row_id").innerHTML;
    var name = list[i].querySelector(".row_name").innerHTML;
    
    var res = id.indexOf(target_id);
    var result = name.indexOf(target_name);
    if (result < 0 || res < 0) {
      list[i].style.display = 'none';
    }
    else {
      list[i].style.display = 'table-row';
    }
  }
}
document.getElementById('find_name').addEventListener('keyup', find);
document.getElementById('find_id').addEventListener('keyup', find);


// ---------------trang thông báo----------------------------
function noticeChecked(){
  var notice = document.querySelectorAll(".notification div");
  notice.forEach(element => {
    element.classList.add("noticeBackground");
  });
}

/// -----------------------------------------------------------
//Xác minh dữ liệu nhập
function Validator(options) {
  function validate(inputElement, rule) {
      var errorMessage = rule.test(inputElement.value);
      var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
      if (errorMessage) {
          errorElement.innerHTML = errorMessage;
      }
      else {
          errorElement.innerHTML = "";
      }
      return !errorMessage;
  }
  var formElement = document.querySelector(options.form);
  var btn = document.querySelector("#submitForm");


  btn.onclick = function(e) {

      var valid = true;

      options.rule.forEach( function(rule) {  

          var inputElement = document.querySelector(rule.selector);
          if (!validate(inputElement, rule)) {
              valid = false;
          }
      });
      if (!valid) {
        formElement.onsubmit = function(){
          return false;
        }
      }
  };

  options.rule.forEach(function(rule){
      var inputElement = document.querySelector(rule.selector);
      
      if (inputElement) {
          inputElement.onblur = function() {
              validate(inputElement, rule);
          }

          inputElement.oninput = function() {
              var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
              errorElement.innerText = "";
              // inputElement.parentElement.classList.remove("");
          }
      }
  })
}

Validator.isRequired = function(selector) {
  return {
      selector: selector,
      test: function(value) {
          return value.trim() ? undefined : "Vui lòng nhập vào trường này";
      }
  };
}

Validator.isProvinceCode = function(selector) {
  return {
      selector: selector,
      test: function(value) {
          if (!value.trim()) {
              return "Vui lòng nhập vào trường này!";
          } else if (value.length !=2 ){
              return "Mã tỉnh/tp không hợp lệ!";
          }
          else {
              return undefined;
          }
      }
  };
}
Validator.isProvinceName = function(selector) {
  return {
    selector: selector,
    test: function(value) {
        value = value.toLowerCase();
        value = value.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        value = value.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        value = value.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        value = value.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        value = value.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        value = value.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        value = value.replace(/đ/g, "d");
        if (!value.trim()) {
            return "Vui lòng nhập vào trường này!";
        } else if (!(/^[A-Za-z ]+$/.test(value))){
            return "Tên tỉnh/tp không hợp lệ!";
        }
        else {
            return undefined;
        }
    }
  };
}
// password có 1 kí tự đặc biệt và 1 chữ viết hoa và nhỏ nhất 8 ký tự
Validator.isPassword = function(selector) {
  return {
      selector: selector,
      test: function(value) {
          if (!value.trim()) {
            return "Vui lòng nhập vào trường này";
          } else if (value.length < 5) {
            return "Mật khẩu phải dài hơn 8 ký tự";
          } else if (!(value.match(/[A-Z]/g))) {
            return "Mật khẩu phải chứa ký tự in hoa"
          } else if (!value.match(/[^a-zA-Z\d]/g)){
            return "Mật khẩu phải chứa ký tự đặc biệt";
          } else {
              return undefined;
          }
      }
  };
}
Validator.isPasswordReset = function(selector) {
  return {
      selector: selector,
      test: function(value) {
          if (!value.trim()) {
            return undefined;
          } else if (value.length < 8) {
            return "Mật khẩu phải dài hơn 8 ký tự";
          } else if (!(value.match(/[A-Z]/g))) {
            return "Mật khẩu phải chứa ký tự in hoa"
          } else if (!value.match(/[^a-zA-Z\d]/g)){
            return "Mật khẩu phải chứa ký tự đặc biệt";
          } else {
              return undefined;
          }
      }
  };
}
function monthDiff(d1, d2) {
  var months;
  months = (d2.getFullYear() - d1.getFullYear()) * 12;
  months -= d1.getMonth() + 1;
  months += d2.getMonth();
  return months <= 0 ? 0 : months;
}
Validator.isStartDate = function(selector) {
  return {
      selector: selector,
      test: function(value) {
          if (!value.trim()) {
              return "Vui lòng nhập vào trường này";
          } else  {
              var now = new Date();
              var startDate = new Date(value);
              if ( monthDiff(now, startDate) > 3 || now > startDate) {
                  return "Ngày nhập không hợp lệ";
              } else {
                  return undefined;
              }
          }
      }
  };
}

Validator.isEndDate = function(selector) {
  return {
      selector: selector,
      test: function(value) {
          if (!value.trim()) {
              return "Vui lòng nhập vào trường này";
          } else  {
              var date = document.getElementById("startDate-reset").value;
              var startDate = new Date(date);
              var endDate = new Date(value);
              if (endDate < startDate) {
                  return "Ngày nhập không hợp lệ so với ngày bắt đầu"
              } else if (monthDiff(startDate, endDate) > 3) {
                  return "Thời gian bắt đầu - kết thúc nên ngắn hơn 3 tháng!";
              } else {
                  return undefined;
              }
          }
      }
  }
}
Validator({
  errorSelector: 'small',
  rule : [
      Validator.isProvinceCode("#local_id"),
      Validator.isProvinceName('#local_name'),
      Validator.isPassword('#local_pass'),
      Validator.isStartDate('#startDate'),
      Validator.isEndDate('#endDate'),
      Validator.isRequired('#startTime'),
      Validator.isRequired('#endTime'),

      Validator.isStartDate('#startDate-reset'),
      Validator.isEndDate('#endDate-reset'),
      Validator.isProvinceCode("#provinceCode-reset"),
      Validator.isProvinceName('#provinceName-reset'),
      Validator.isPasswordReset('#password-reset')
  ]
});