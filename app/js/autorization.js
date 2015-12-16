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
            url = "autorization.php",
            defObj = _ajaxForm(form, url);
    };
    
    var _ajaxForm = function(form, url){
        if(!validationModule.isFormValid(form)){
            console.log("Запрос на сервер не отправляем");
            return false;   
        }  
    };

    return {
        init: initInside
    };
    
})();

autorizationModule.init(); 