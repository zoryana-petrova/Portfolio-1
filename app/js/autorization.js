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
       var _clearForm = function(){
        var $form = $("#autorization-form");
        
        // Скрываем сообщение об ошибке
        $form.find('.message').hide();

        // Очистить тултипы
        $form.find('.form-input')
            .trigger("hideTooltip");

        // Очищаем классы ошибок
        $form.find(".error")
            .removeClass("error");  
    }
    
    var _submitForm = function(e){
        e = e || window.e;
        e.preventDefault ? e.preventDefault() : (e.returnValue=false);
        
        var form = $(this),
            url = "/autorization.php";
          
        if(!window.validationModule.isFormValid(form)){
            _showError(form, "Заполните все поля формы!");
            return false;   
        }  

        defObj = _ajaxForm(form, url);
        defObj.done(function(response){
            if(response.error){
                _showError(form, response.errorMessage);
                return;
            }

            // Переходим на страницу "Обо мне"
            window.location.href = "/index.html";
        });
        
        defObj.fail(function(error) {
            _showError(form, "На сервере произошла ошибка");
        });  
    };
    
    var _ajaxForm = function(form, url){
        _hideError(form)
   
        return $.post(url, form.serialize());
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