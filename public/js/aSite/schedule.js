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

function openNotify(){
    document.getElementById("notificate").style.display = "block";
  }
function tick(self) {

    let url = $("#done_url").val();
    $.post(url, {
        '_token' : $("#token").val()
    }, function(response) {
        if (response.success) {
            
            self.querySelector("i").style.color = "rgb(12, 21, 153)";
            $('#notificate').html("<button onclick='del(this)'><i class='fas fa-times-circle'></i></button><p class='message'>Gửi báo cáo thành công!</p>");
            openNotify();
            $('#notificate').fadeOut(5000);
            document.querySelector(".tick label i").classList.add = "tick-background";
            document.querySelector(".tick label i").classList.remove = "tick-uncheck";
        }
        else {
            $('#notificate').html("<button onclick='del(this)'><i class='fas fa-times-circle'></i></button><p class='message'>Gửi báo cáo không thành công!</p>");
            openNotify();
            $('#notificate').fadeOut(5000);
        }
    })
}