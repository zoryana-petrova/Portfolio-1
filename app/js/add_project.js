var addProjectModule = (function () {

    // Инициализация модуля
	var initInside = function () {
		_setUpListeners();
	};

    // Прослушка событий
	var _setUpListeners = function (){
		$("#add-new-project").on("click", _showModal); //открыть модальное окно 
		$("#add-project").on("submit", _addProject); //Добавление проекта 
        $("form").on("keydown", ".error", _removeError);
        $("form").find("input[type='file']").on("change", _loadFile);
	};
    
    var _loadFile = function(){
        var $inputFile = $(this),
            $labelFile = $inputFile.closest('form').find(".add-image");

        $labelFile.html(this.value);

        if (this.value !== '') {
            $labelFile.removeClass("error").trigger("hideTooltip");
        } else {
            $labelFile.trigger("hideTooltip");
        }
    }
  
    var _removeError = function (){
        var $this = $(this),
            value = $this.val();

        if(value !== ""){
            $this.removeClass("error");    
        }        
    };

    var _clearForm = function(){
        var $form = $("#add-project");
        
        // Скрываем сообщение об ошибке
        $form.find('.message').hide();

        // Делаем нативный ресет формы чтобы очистить file input
        $form.trigger('reset');

        // Очистить тултипы
        $form.find('.form-input, .add-project-textarea, .add-image')
            .trigger("hideTooltip");

        $form.find(".add-image")
            .html("Загрузите и изображение");

        // Очищаем классы ошибок
        $form.find(".error")
            .removeClass("error");  
    }

    // Работа с модальным окном
	var _showModal = function(e){
		e = e || window.e;
		e.preventDefault ? e.preventDefault() : (e.returnValue=false);

		var blockPopup = $("#popup-page"),
			form = blockPopup.find('.portfolio-form');
		
        blockPopup.bPopup({
			easing: 'easeOutBack',
            speed: 600,
            transition: 'slideDown',
            modalColor: '#94907e',
            autoClose: 300000,
            onClose: function () {
                _clearForm();
            }
		});
	};
    
    // Добавление проекта
	var _addProject = function(e){
		e = e || window.e;
		e.preventDefault ? e.preventDefault() : (e.returnValue=false);

		//объявляем переменные
		var form = $(this),
			url = 'add_project.php';


        if(!validationModule.isFormValid(form)){
            return false;   
        }           
   
        var serverAnswer = _ajaxForm(form, url);
		//запрос на сервер
        serverAnswer.done(function (ans) {
                       
            var succesMessage = form.find(".ms-succes"),
                errorMessage = form.find(".ms-error");
            
            if(ans.status === 'OK'){
                errorMessage.hide();
                succesMessage.show();
            }else{
                succesMessage.hide();
                errorMessage.show();
            }
        })
        
	};
    
    //Функция использует:
    //@form -форма 
    //@url - адрес php файла 
    //1. проверить форму 
    //2. собрать данные из формы
    //3. вернуть ответ из севера 
   
    var _ajaxForm = function (form, url) {
           
        data = form.serialize();
        var result = $.ajax({
			url: url,
			type: "POST",
			dataType: "json",
			data: data
		});
        
        result.fail(function(ans) {
            form.find('.ms-error').text("На сервере произошла ошибка").show();  //очистить текст
		})
        
        return result;      
    };
  
    //Возврат объекта (публичные методы)
	return {
		init: initInside,
	};
	
})();

addProjectModule.init(); 

   




