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

function tick(self) {

    let url = $("#done_url").val();
    $.post(url, {
        '_token' : $("#token").val()
    }, function(response) {
        if (response.success) {
            alert("Gửi báo cáo hoàn thành thành công");
            self.querySelector("i").style.color = "rgb(12, 21, 153)";
        }
        else {
            alert("gửi báo cáo hoàn thành không thành công");
        }
    })
}