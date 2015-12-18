var autorizationModule = (function () {

    var initInside = function () {
        _setUpListeners();
    };

    var _setUpListeners = function (){
        //прослушка событий
        $("#autorization-form").on("submit", _submitForm);
        $("form").on("keydown", ".error", _removeError);
        $("form").on("reset", _clearForm);
    }
    var _removeError = function (){
        $(this).removeClass("error");
    };
    var _clearForm = function(form){
        var form = $(this);
        form.find(".form-input").trigger("hideTooltip");
        form.find(".error").removeClass("error");
    };
    var _submitForm = function(e){
        e = e || window.e;
        e.preventDefault ? e.preventDefault() : (e.returnValue=false);
        
        var form = $(this),
            url = "/autorization.php",
            defObj = _ajaxForm(form, url);
    };
    
    var _ajaxForm = function(form, url){
        _hideError(form)

        if(!window.validationModule.isFormValid(form)){
            console.log("Запрос на сервер не отправляем");
            _showError(form, "Заполните все поля формы!");
            return false;   
        }  

        console.log("ajax запрос, но с проверкой формы");
       
        var data = form.serialize();
        var result = $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: data
        });

        result.success(function(response){
            console.log('Ответ от сервера');
            console.log(response)

            if(response.error){
                _showError(form, response.errorMessage);
                return;
            }

            // Переходим на страницу "Обо мне"
            window.location.href = "/index.html";
        })
        
        result.fail(function(error) {
            console.log("Проблемы в PHP");
            _showError(form, "На сервере произошла ошибка");
        })
        
        return result;    
    };

    var _showError = function(form, message){
        form.find('.ms-error').text(message).show();  
    }

    var _hideError = function(form){
        form.find('.ms-error').text('').hide();  
    }

    return {
        init: initInside
    };
    
})();

autorizationModule.init(); 