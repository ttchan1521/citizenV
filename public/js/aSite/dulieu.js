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


  // $.get(url, {
  //   '_token': $("#token_t").val()
  // }, function (response) {
  //     if (response.position == 'a1') {
  //       $('#search').html('<legend>Tìm kiếm: </legend>');
  //       // $('#search').html('<legend>Tìm kiếm: </legend><input type="text" id="province" placeholder="Nhập Tỉnh/tp"><input type="text" id="district" placeholder="Nhập Quận/huyện"><input type="text" id="ward" placeholder="Nhập Xã/phường"><input type="text" id="citizenName" placeholder="Nhập tên người dân">');
  //     }
  //     else {
  //       $('#search').html('<legend>Tìm kiếm: </legend><input type="text" id="district" placeholder="Nhập Quận/huyện"><input type="text" id="ward" placeholder="Nhập Xã/phường"><input type="text" id="citizenName" placeholder="Nhập tên người dân">');
  //     }

  // });
  
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
    let id = row.querySelector(".citizen_id").val();
    let url = $("#infoCitizen_url").val();
    $.post(url, {
      '_token': $("#token_ci").val(),
      'id' : id
    }, function(response) {
      document.getElementById('citiInfo-content').innerHTML = "";
      if (response.data) {
    
          let title = document.createElement('div');
          title.innerHTML="<p>Thông tin công dân</p>";
          let sche = document.createElement('h1');
          sche.innerHTML = response.data["fullname"] + " " + response.data["birthdate"] + response.data["gender"];
          
          document.getElementById('his-content').appendChild(sche);
          document.getElementById('his-content').appendChild(title);
        
      }
      else {
        // document.createElement('div').innerHTML = "";
        let p = document.createElement('p');
        p.innerHTML = "Chưa có lịch khai báo nào!";
        document.getElementById('his-content').appendChild(p);
      }
    })
    citizenInfo_form.style.display = "block";
  }