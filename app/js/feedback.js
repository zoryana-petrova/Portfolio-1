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
    
    var _clearForm = function(form){
        var form = $(this);
        form.find(".form-input, .form-textarea").trigger("hideTooltip");
        form.find(".error").removeClass("error");
    };
    
    var _submitForm = function(e){
        e = e || window.e;
		e.preventDefault ? e.preventDefault() : (e.returnValue=false);
        
        var form = $(this),
            url = "feedback.php",
            defObj = _ajaxForm(form, url);
    };
    
    var _ajaxForm = function(form, url){
        if(!validationModule.isFormValid(form)){
            return false;   
        }  
    };
    //Возврат объекта (публичные методы)
	return {
		init: initInside
	};
    
})();

feedbackModule.init(); 