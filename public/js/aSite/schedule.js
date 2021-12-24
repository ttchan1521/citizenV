function tick(self) {
    let url = $("#done_url").val();
    $.post(url, {
        '_token' : $("#token").val()
    }, function(response) {
        if (response.success) {
            alert("Gửi báo cáo hoàn thành thành công");
            self.parentNode.querySelector(".tick-uncheck").style.color = "blue";
        }
        else {
            alert("gửi báo cáo hoàn thành không thành công");
        }
    })
}