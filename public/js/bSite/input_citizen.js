let appear = false;
function open_menu(mark) {
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
document.querySelector('#menu .fas').addEventListener('click', function(){
    open_menu(1);
});

window.addEventListener('resize', function() {
    open_menu(2);
    if (window.innerWidth > 856) {
        document.querySelector('.link ul').style.display = 'flex';
    }
})

let del = document.querySelectorAll('.view');
del.forEach(dele => {
    dele.addEventListener('click', function() {
        document.querySelector('#confirm').style.display = 'block';
    
    });

});

function del_cancel() {
    document.querySelector('#confirm').style.display = 'none';
}


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
        Validator.isName("#fullname"),
        Validator.isDate('#ngaysinh'),
        Validator.isRequired('#gioitinh'),
        Validator.isRequired('#quequan')
    ]
});