let appear = false;
let originData;
let infor;

/** function open_menu(mark) {
    if ((appear == false) && (mark==1)) {
        document.querySelector('.link ul').style.display = 'block';
        document.querySelector('#danso').classList.remove('hidden');
        appear = true;
    }
    else 
    {
        document.querySelector('.link ul').style.display = 'none';
        document.querySelector('#danso').classList.add('hidden');
        appear = false;
    }
    console.log(appear);
}



window.addEventListener('resize', function() {
    open_menu(2);
    if (window.innerWidth > 856) {
        document.querySelector('.link ul').style.display = 'flex';
    }
})

*/

let del = document.querySelectorAll('.view');
del.forEach(dele => {
    dele.addEventListener('click', function() {
        document.querySelector('#confirm').style.display = 'block';
    
    });

});

function del_cancel() {
    document.querySelector('#confirm').style.display = 'none';
}

document.getElementById("btn1_submit").disabled = true;
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

    var btn = document.querySelector("#check");


    btn.onclick = function(e) {

        var valid = true;

        options.rule.forEach( function(rule) {  

            var inputElement = document.querySelector(rule.selector);
            if (!validate(inputElement, rule)) {
                valid = false;
            }
        });

        if (valid) {
            check();
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

Validator.isName = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            if (!value.trim()) {
                return "Vui lòng nhập vào trường này";
            } else if (!(/^[A-Za-z ]+$/.test(value))){
                return "Tên của bạn không hợp lệ";
            }
            else {
                return undefined;
            }
        }
    };
}

Validator.isDate = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            if (!value.trim()) {
                return "Vui lòng nhập vào trường này";

            } else  {
                var now = new Date();
                var birth = new Date(value);
                var now_year = now.getFullYear();
                var birth_year = birth.getFullYear();
                if (now_year - birth_year > 110 || now < birth) {
                    return "Ngày tháng năm sinh không hợp lệ";
                } else {
                    return undefined;
                }
            }
        }
    };
}

Validator({
    errorSelector: 'small',
    rule : [
        //Validator.isName("#fullname"),
        Validator.isDate('#ngaysinh'),
        Validator.isRequired('#gioitinh'),
        //Validator.isRequired('#quequan')
    ]
});


function apply(data = infor) {

    document.getElementById("fullname").value = data.fullname;
    document.getElementById("ngaysinh").value = data.birthdate;
    document.getElementById("gioitinh").value = data.gender;
    document.getElementById("job").value = data.job;
    document.getElementById("quequan").value = data.hometown;
    document.getElementById("cccd").value = data.identity_num;
    document.getElementById("tongiao").value = data.ton_giao;
    document.getElementById("level").value = data.education_level;
    document.getElementById("tamtru").value = data.temporary_add;
    document.getElementById("thuongtru").value = data.address;

    originData = data;
    document.getElementById("btn1_submit").disabled = false;

}
function getOne(self) {
    let id = self.parentNode.parentNode.querySelector(".row_id").value;

    let url = $("#getOne_url").val();

    $.post(url, {
        '_token' : $("#token").val(),
        'id' : id
    }, function(response) {
        if (response.data) {
            apply(response.data);
        }
    });
}



function check() {
    let fullname = document.getElementById("fullname").value;
    let birthdate = document.getElementById("ngaysinh").value;
    let gender = document.getElementById("gioitinh").value;

    let url = $("#test_url").val();

    $.post(url, {
        '_token' : $("#token1").val(),
        'fullname' : fullname,
        'birthdate' : birthdate,
        'gender' : gender
    }, function(response) {
        if (response.data) {
            document.getElementById("test-content").innerHTML = response.data.fullname;

            infor = response.data;
            
        }
        else {
            document.getElementById("test-content").innerHTML = "Không có dữ liệu";
            document.getElementById("btn1_submit").disabled = false;
            originData = null;
        }
        document.getElementById("test").style.display = "block";
        
        
    });
}

function close_test() {
    document.getElementById("test").style.display = "none";
}


function declareCtzen() {
    console.log("hi");
    let url = $("#declare_url").val();
    let id = false;

    if (originData) {
        id = originData.citizen_id;
    }

    let cccd = $("#cccd").val().trim();
    if (!cccd) {
        cccd = "";
    }

    let ton_giao = $("#tongiao").val().trim();
    if (!ton_giao) {
        ton_giao = "";
    }

    $.post(url, {
        '_token' : $("#token1").val(),
        'id' : id,
        'fullname' : $("#fullname").val(),
        'birthdate' : $("#ngaysinh").val(),
        'gender' : $("#gioitinh").val(),
        'job' : $("#job").val(),
        'hometown' : $("#quequan").val(),
        'identity_num' : cccd,
        'ton_giao' : ton_giao,
        'level' : $("#level").val(),
        'temporary_add' : $("#tamtru").val(),
        'address' : $("#thuongtru").val()
    }, function(response) {
        if (response.success) {
            alert("Khai báo thành công");
        }
        else {
            alert("Khai báo không thành công");
        }
    });
}