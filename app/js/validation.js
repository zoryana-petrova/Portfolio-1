window.validationModule = (function () {

	// Инициализация модуля
	var initInside = function () {
		_setUpListeners();
	};

	// Прослушка событий
	var _setUpListeners = function (){
    };

    //Создание тултипов
	var _createQtip = function (element, position){

		//позиция тултипа
		if(position === "right"){
			position = {
				my: "left center",
				at: "right center"
            }
		}else{
			position = {
				my: "right center",
				at: "left center",
				adjust: {
					method: "shift none"
				}
			}
		}
		//инициализация тултипа
		element.qtip({
			content: {
				text: function(){
					return $(this).attr("qtip-content");
				}
			},
			show: {
				event: "show",
                effect: function(offset) {
		            $(this).slideDown(50);
                }
			},
			hide: {
				event: "keydown hideTooltip",
				effect: function(offset) {
		            $(this).slideUp(50); 
		          }
			},
			position: position,
			style: {
				classes: "qtip-rounded qtip-myclass",
				tip: {
					height: 5,
					width: 10,
          color: "#e48e70"
				}
			}
		}).trigger("show");
	};

  //Универсальная функция.  Валидация формы
  var _checkInputs = function ($form) {
    var elems = $form.find("input, textarea").not('input[type=file]'),
        isValid = true;

    elems.each(function(i, elem){
      var $elem = $(elem);
      
      if($elem.val() === ''){

        // Bugfix: Дополнительные тултипы в браузерах не поддерживающих placeholder
        // Если placeholder не поддерживается
        if(!Modernizr.input.placeholder){
          // Если элемент типа password и иммет класс placeholder
          if($elem.is('[type="password"]') && !$elem.hasClass('placeholder')){
            return;
          }
        }

         _createQtip($elem, $elem.attr("qtip-position"));
      
        $(this).addClass("error");
        isValid = false;
      }
    });

  return isValid;

  };

  // Валидация input type="file"
  var _checkInputFile = function (form) {
    var $inputFile = form.find("input[type='file']"),
        $labelFile = form.find(".add-image"),
        isValid = true;

      _createQtip($labelFile);

    if ($inputFile.val() === "") {
      $labelFile.addClass("error").trigger("show");
      isValid = false;
    } else {
      $labelFile.removeClass("error").trigger("hideTooltip");
    }
    return isValid;
  };

  var isFormValid = function($form){
    var isInputFileValid = _checkInputFile($form);
    var isInputsValid = _checkInputs($form);

      if(!isInputFileValid || !isInputsValid){
            $form.find('.ms-error').show();
            return false;
      }
    return true;
  }
  //Возврат объекта (публичные методы)
  return {
      init: initInside,
      isFormValid: isFormValid, //валидация формы
  };

})();

validationModule.init();