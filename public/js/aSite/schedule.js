function openNotify(){
    document.getElementById("notificate").style.display = "block";
  }
function tick(self) {
    let url = $("#done_url").val();
    $.post(url, {
        '_token' : $("#token").val()
    }, function(response) {
        if (response.success) {
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