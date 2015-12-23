var feedbackModule = (function () {

    // Инициализация модуля
	var initInside = function () {
		_setUpListeners();
	};

    // Прослушка событий
	var _setUpListeners = function (){
        $("#feedback-form").on("submit", _submitForm);
        $("form").on("keydown", ".error", _removeError);
        $("form").on("reset", _clearForm);
        
	};

    var _removeError = function (){
        $(this).removeClass("error");
    };
    
    var _clearForm = function(){
        var $form = $("#feedback-form");
        
        // Скрываем сообщение об ошибке
        $form.find('.form-status-message').hide();

        // Очистить тултипы
        $form.find('.form-input, .form-textarea')
            .trigger("hideTooltip");

        // Очищаем классы ошибок
        $form.find(".error")
            .removeClass("error");  
    }
    
    var _submitForm = function(e){
        e = e || window.e;
		e.preventDefault ? e.preventDefault() : (e.returnValue=false);
        
        var form = $(this);
            url = "feedback.php";

        if(!validationModule.isFormValid(form)){
            console.log("Запрос на сервер не отправляем");
            return false;   
        }  

        var defObj = _ajaxForm(form, url);

        defObj.done(function(result){
            if(result.error === false){
                // Если не ошибка
                _showMessage(form, false, 'Спасибо за отзыв. Свяжемся в ближайшее время!');
                return;
            }

            if(result.captchaError){
                // Ошибка каптча
                _showMessage(form, true, 'Неверно введины символы из рисунка!');
            }else{
                _showMessage(form, true, 'Извините, ваше сообщение не было отправлено. Попробуйте позже.');
            }
        });
        
        defObj.fail(function(error){
            // что-то произошло с сервером
            _showMessage(form, true, 'Извините, ваше сообщение не было отправлено. Попробуйте позже.')
        });

    };
    
    var _ajaxForm = function(form, url){
        return $.post(url, form.serialize());
    };

    var _showMessage = function(form, isError, message){
        var $msgContainer = form.find('.form-status-message'),
            cssClass = isError ? 'ms-error' : 'ms-success';

        $msgContainer
            .addClass(cssClass)
            .text(message)
            .show();
    }

    var _hideMessage = function(form){
        var $msgContainer = form.find('.form-status-message');

        $msgContainer
            .removeClass('ms-error ms-success');

        $msgContainer
            .text('')
            .hide();
    }

    //Возврат объекта (публичные методы)
	return {
		init: initInside
	};
})();

feedbackModule.init(); 