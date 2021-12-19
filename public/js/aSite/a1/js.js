
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

function add_province(){
  addProvince.style.display = "block";
}
function permis_click(self){
  addSchedule.style.display = "block";
}
window.onclick = function(e){
    if(e.target == addProvince || e.target == addSchedule || e.target == delete_btn){
      addProvince.style.display = "none";
      addSchedule.style.display = "none";
      delete_btn.style.display = "none";
    }
}

function closePopup(){
  addSchedule.style.display = "none";
  addProvince.style.display = "none";
  delete_btn.style.display = "none";
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
          addLocal(id, name);
        }
        else {
          alert('Thêm không thành công');
        }

    });

  });
});


// ---------------trang thông báo----------------------------
function noticeChecked(){
  var notice = document.querySelectorAll(".notification div");
  notice.forEach(element => {
    element.classList.add("noticeBackground");
  });
}
