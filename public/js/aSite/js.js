
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

function add_province(){
  addProvince.style.display = "block";
}
function permis_click(self){
  addSchedule.style.display = "block";
}
function edit_click(self) {
  edit_data.style.display = "block";
}
window.onclick = function(e){
  if(e.target == addProvince || e.target == addSchedule 
    || e.target == delete_btn || e.target == edit_data){
    addProvince.style.display = "none";
    addSchedule.style.display = "none";
    delete_btn.style.display = "none";
    edit_data.style.display = "none";
  }
}

function closePopup(){
  addSchedule.style.display = "none";
  addProvince.style.display = "none";
  delete_btn.style.display = "none";
  edit_data.style.display = "none";
}
function popup_del(){
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

function addLocal(id, name) {
  let row = document.createElement('tr');
  let col1 = document.createElement('td');
  col1.innerHTML = "<input type='checkbox' class='check' onclick='tick_box(this)'>";
  let col2 = document.createElement('td');
  col2.innerHTML = id;
  let col3 = document.createElement('td');
  col3.innerHTML = name;
  col3.classList.add('left');

  let col4 = document.createElement('td');
  col4.classList.add('left');
  let col5 = document.createElement('td');
  col5.classList.add('left');

  let col6 = document.createElement('td');
  col6.innerHTML = '<div class="switch"><input type="checkbox"><label><i></i></label></div>';

  let col7 = document.createElement('td');
  col7.innerHTML = '<input type="checkbox" onclick="tick(this)"><label><i class="fas fa-check"></i></label>';
  col7.classList.add('tick');

  let col8 = document.createElement('td');
  col8.innerHTML = '<a href=""><i class="fas fa-edit"></i></a>';
  let col9 = document.createElement('td');
  col9.innerHTML = '<a href=""><i class="fas fa-trash-alt"></i></a>';

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

$(document).ready(function() {
  $('#popup').submit(function(e) {
    e.preventDefault();

    let id = $('#local_id').val();
    let name = $('#local_name').val();

    $.post('/addLocal', {
      '_token': $("#token").val(),
      'id': id,
      'name': name,
      'password': $('local_pass').val()
    }, function (response) {

        if (response.success) {
          alert('Thêm thành công');
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
    
  });
});

function find() {
  let list = document.querySelectorAll("#list tr");
  let target_name = document.getElementById('find_name').value;
  let target_id = document.getElementById('find_id').value;
  for (var i=0; i<list.length; i++) {
    var id = list[i].childNodes[3].innerHTML;
    var name = list[i].childNodes[5].innerHTML;
    
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

  var btn = document.querySelector("#submitForm");


  btn.onclick = function(e) {

      var valid = true;

      options.rule.forEach( function(rule) {  

          var inputElement = document.querySelector(rule.selector);
          if (!validate(inputElement, rule)) {
              valid = false;
          }
      });
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