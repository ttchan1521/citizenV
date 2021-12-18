$("#form").submit(function(e) {
    e.preventDefault();
    $.post("/checkLogin", {
        '_token': $("#token").val(),
        'username' : $("#username").val(),
        'password' : $('#password').val() 
    }, function (response) {
        if (response.success) {
            window.location = response.url;
        }
        else {
            
        }

    });
});