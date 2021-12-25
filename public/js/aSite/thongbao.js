function noticeChecked(){
    var notice = document.querySelectorAll(".notification div");
    notice.forEach(element => {
      element.classList.add("noticeBackground");
    });
  }