$(function () {
	/*----------------------------------------------------
	 UA
	 ----------------------------------------------------*/
	var userAgent = window.navigator.userAgent.toLowerCase();
	var body = $('body');
	if (userAgent.indexOf('msie') >= 0 || userAgent.indexOf('trident') >= 0 || navigator.userAgent.match(/Firefox/)) {
		body = $('html');
	}


	/*----------------------------------------------------
	 gnav
	 ----------------------------------------------------*/
	$('#gnav ul > li > a').on('click', function () {
		return false;
	});



	/*----------------------------------------------------
	 coordination__setting
	 ----------------------------------------------------*/
	$('.coordination__setting li input[data-toggle]').on('change', function () {
		if ($(this).is(':checked')) {
			var _check = $(this).attr('data-toggle');
			$('.coordination__setting li input[data-toggle="' + _check + '"]').prop('checked', false);
			$(this).prop('checked', true);
		}
	});


	/*----------------------------------------------------
	 section__toggle
	 ----------------------------------------------------*/
	$('.section__toggle a').on('click', function () {
		if ($(this).attr('class') !== 'closed') {
			$(this).addClass('closed');
			$(this).parent().parent().parent().find('.block').slideUp(500, 'easeOutQuint');
		} else {
			$(this).removeClass('closed');
			$(this).parent().parent().parent().find('.block').slideDown(500, 'easeOutQuint');
		}
		return false;
	});


	/*----------------------------------------------------
	 overlay
	 ----------------------------------------------------*/
	var nowOpenNav = -1;
	var nowOpenY = 0;
	var nowTarget;
	var launch__cancel = ("#launch__cancel");
	var launch__detail = ("#launch__detail");

	$('.ag__overlay').on('click', function () {
		if (nowOpenNav === -1) {
			nowTarget = $(this).attr('data-overlay');
			nowOpenY = $(window).scrollTop();
			nowOpenNav = 0;
			$('#page').fadeOut(200, function () {
				body.animate({
					scrollTop: 0
				}, 0);
				$('#' + nowTarget + '').fadeIn(200);
			});
		}
		return false;
	});
	$('.ag__overlay_cancel').on('click', function () {
		if (nowOpenNav === 0) {
			nowTarget = $(this).attr('data-overlay');
			nowOpenY = $(window).scrollTop();
			nowOpenNav = 0;
			$(launch__detail).fadeOut(200, function () {
				body.animate({
					scrollTop: 0
				}, 0);
				$(launch__cancel).fadeIn(200);
			});
		}
	});
	$('.ag__overlay_launch').on('click', function () {
		if (nowOpenNav === 0) {
			nowTarget = $(this).attr('data-overlay');
			nowOpenY = $(window).scrollTop();
			nowOpenNav = 0;
			$(launch__cancel).fadeOut(200, function () {
				body.animate({
					scrollTop: 0
				}, 0);
				$(launch__detail).fadeIn(200);
			});
		}
	});
	$('.overlay__close').on('click', function () {
		if (nowOpenNav === 0) {
			nowOpenNav = -1;
			$('#' + nowTarget + '').fadeOut(200, function () {
				$('#page').show();
				body.animate({
					scrollTop: nowOpenY
				}, 0);
			});

		}
		return false;
	});

	$('.ag__overlay__change').on('click', function () {
		var tmpTarget = $(this).attr('data-overlay');
		$('#' + nowTarget + '').fadeOut(200, function () {
			nowTarget = tmpTarget;
			$('#' + nowTarget + '').show();
		});
		return false;
	});


	/*----------------------------------------------------
	 modal
	 ----------------------------------------------------*/
	$('#ag__open__modal, .ag__open__modal').on('click', function () {
		$('#modal__bg').fadeIn(200, function () {
			$('#modal').fadeIn(200);
		});
		return false;
	});

	$('#ag__open__modal__savemsg, .ag__open__modal__savemsg').on('click', function () {
		$('#modal__bg').fadeIn(200, function () {
			$('#modal__savemsg').fadeIn(200);
		});
		return false;
	});

	$('.modal__close').on('click', function () {
		$('#modal, #modal__savemsg').fadeOut(200, function () {
			$('#modal__bg').fadeOut(200);
		});
		return false;
	});

	/*----------------------------------------------------
	 セル選択でボタン活性化
	 ----------------------------------------------------*/
	var $cell = $("#price_calender .frame, #publish_calender .frame");
	var pcalender = $('#price_calender, #publish_calender');
	var $resetDate = $('#resetDate');
	var selectedCheck = function () {
		if (pcalender.find('.selected').length) {
			$resetDate.prop('disabled', false);
		} else {
			$resetDate.prop('disabled', true);
		}
	};
	selectedCheck();

	var selectedDayOfWeek = function () {
		if (pcalender.find('.selected').length) {
			$resetDate.prop('disabled', false);

		} else {
			$resetDate.prop('disabled', true);
		}
	};
	selectedDayOfWeek();
	/*----------------------------------------------------
	 リセットボタン
	 ----------------------------------------------------*/
	var chkbxDOW = $('.js-dow');

	/*$(document).on('click','.js-price_calender__cell.hol .national-holiday',function () {
		if($('.frame.national-holiday.limited.selected').length == 0){
			$('#select__hol').prop('checked',false);
		}
	});*/

	var $resetButton = $('#resetDate');
	//$resetButton.on('click', function () {
	//	$cell.removeClass('selected');
	//	$(this).prop('disabled', true);
	//	chkbxDOW.prop('checked', false);
	//	$cell.prop('checked', false);
	//
	//});
	/*----------------------------------------------------
	 前月 / 翌月ボタン
	 ----------------------------------------------------*/
	var $next_prevButton = $('#agBtnPrev, #agBtnNext');
	var $reserveMonth = $('#reserveMonth');
	$next_prevButton.on('click', function () {
		$cell.removeClass('selected');
		chkbxDOW.prop('checked', false);
		$cell.prop('checked', false);
		if ($resetButton.prop('.selected')) {
			$resetDate.prop('disabled', false);
		} else {
			$resetDate.prop('disabled', true);
		}
	});

	/*----------------------------------------------------
	 予約月選択セレクト
	 ----------------------------------------------------*/
	$reserveMonth.on('change', function () {
		$cell.removeClass('selected');
		chkbxDOW.prop('checked', false);
		$cell.prop('checked', false);
		if ($resetButton.prop('.selected')) {
			$resetDate.prop('disabled', false);
		} else {
			$resetDate.prop('disabled', true);
		}
	});
	/*----------------------------------------------------
	 calender disabledチェク
	 ----------------------------------------------------*/
	var calenderCheckDisable = function (obj) {
		var _this = obj;
		var _parent = _this.parent();
		if(_parent.hasClass("disabled")) {return true;}
		if(_parent.closest("table").attr("id") == "publish_calender"){
			if(!_this.hasClass("limited")){
				return true;
			}
		}
		return false;
		/*
		var _parentClass = _this.parent().attr('class');
		_parentClass = (_parentClass) ? _parentClass : '';
		var _disable = (_parentClass.match(/disabled/)) ? true : false;
		return _disable;
		*/
	};
	/*----------------------------------------------------
	 //セル選択＋ドラッグ選択
	 ----------------------------------------------------*/
	var calender = $(".js-price_calender__row");
	var calenderCell = $(".js-price_calender__cell");
	var isMouseDown = false,
			isselected;
	var _disable = ($(this).parent().hasClass("disabled")) ? true : false;
	var publishCalendar = ($("#publish_calender").length > 0) ? true : false;
	var chkbxNaHol = $('.js-national-holidays');
	$(document)
			.on("mousedown", "#price_calender .frame, #publish_calender .frame.limited", function () {
				isMouseDown = true;
				var _parentDisable = calenderCheckDisable($(this));
				if (!_parentDisable) {
					$(this).toggleClass("selected");
				}
				isselected = $(this).hasClass("selected");
				if (!_disable) {
					selectedCheck();
				}
				/*曜日セルを一列クリックするとチェックボックスにチェック*/
				var dow = $(this).parents('tr').first().find(".js-price_calender__cell").index($(this).parent());
				var _checkFlag = true;
				chkbxDOW.eq(dow).prop('checked', true);
				$(".js-price_calender__row").each(function (val) {
					if(publishCalendar) {
						var _this = $(".js-price_calender__row").eq(val).find(".js-price_calender__cell").eq(dow).find('span.limited');
					} else {
						var _this = $(".js-price_calender__row").eq(val).find(".js-price_calender__cell").eq(dow).find('span.frame');
					}
					var _cell = $(".js-price_calender__row").eq(val).find(".js-price_calender__cell").eq(dow);
					if ($(_this).length > 0 && !_cell.hasClass('disabled')) {
						chkbxDOW.eq(dow).prop('checked', false);
						if (!_this.hasClass('selected')) {
							_checkFlag = false;
						}
					}
				});
				if (_checkFlag) {
					chkbxDOW.eq(dow).prop('checked', true);
				}
				var _isHol = ($(this).parent().hasClass('hol'))? true: false;
				if(_isHol) {
					var _checkFlagHol = true;
					chkbxNaHol.prop("checked", true);
					$('.national-holiday').each(function(i, val){
						if(publishCalendar) {
							if($(val).hasClass('limited') && !$(val).parent().hasClass('disabled')) {
								chkbxNaHol.prop("checked", false);
								if(!$(val).hasClass("selected")) {
									_checkFlagHol = false;
								}
							}
						} else {
							if(!$(val).parent().hasClass('disabled')) {
								chkbxNaHol.prop("checked", false);
								if(!$(val).hasClass("selected")) {
									_checkFlagHol = false;
								}
							}
						}

					});
					if(_checkFlagHol) {
						chkbxNaHol.prop('checked', true);
					}
				}
				/*ここまで*/
				return false; // prevent text selection
			})
			.on("mouseover", "#price_calender .frame, #publish_calender .frame.limited", function () {
				if (isMouseDown) {
					$(this).toggleClass("selected", isselected);
				}
				if (!_disable) {
					selectedCheck();
				}
			})
			.on("selectstart", "#price_calender .frame, #publish_calender .frame.limited", function () {
				return false;
			});
	$(document)
			.on("mouseup", "#price_calender .frame, #publish_calender .frame.limited", function () {
				isMouseDown = false;
			});


	/*----------------------------------------------------
	 //曜日で選択(th)
	 ----------------------------------------------------*/
	var tableRow = $('.table-row');
	$('.table-row').on('click', function () {
		var tableRawIndexThis = $('.table-row').index(this);
		chkbxDOW.eq(tableRawIndexThis).prop('checked', function (index, prop) {
			return !prop;
		}).change();
	});
	/*----------------------------------------------------
	 //曜日で選択(checkbox)
	 ----------------------------------------------------*/

	chkbxDOW.on("change", function () {
		var flg = $(this).prop('checked');
		var dow = chkbxDOW.index(this);
		$(".js-price_calender__row").each(function () {
			var _this = $(this).find($("#price_calender .frame, #publish_calender .frame")).eq(dow);
			var _parentDisable = calenderCheckDisable(_this);
			if (!_parentDisable) {
				_this.toggleClass('selected', flg);
			}
		});
		selectedCheck();
	}).change();

	/*----------------------------------------------------
	 //カレンダー全選択
	 ----------------------------------------------------*/
	var selectAll = $("#js-selectAll, #js-selectAll2");
	selectAll.on('click', function () {
		if (selectAll.is(':checked')) {
			chkbxDOW.prop('checked', true).change();
		} else {
			chkbxDOW.prop('checked', false).change();
		}
	});

	/*----------------------------------------------------
	 祝日判定
	 ----------------------------------------------------*/
	var $nationalHolidays = $('#select__hol[data-target=".national-holiday"], #select__hol2[data-target=".national-holiday"],#select__hol[data-target=".national-holiday.limited"]');
	$nationalHolidays.on("change", function () {
		var flag = ($nationalHolidays.filter(':checked').length > 0) ? 'addClass' : 'removeClass';
		$($(this).attr('data-target'))[flag]('selected');
		selectedCheck();
	});
	/*----------------------------------------------------
	 //カレンダー土日祝選択
	 ----------------------------------------------------*/
	var selectHolidays = $("#js-selectHolidays, #js-selectHolidays2");
	var $holiday = $('.js-holiday');
	selectHolidays.on('click', function () {
		var checked = selectHolidays.is(':checked');
		$('.js-holiday, .js-national-holidays').prop('checked', checked) /*.change()*/ ;
		$(".js-price_calender__row").each(function () {
			for (var i = 0; i <= 6; i++) {
				var td = $(this).find(".frame").eq(i);
				if(calenderCheckDisable(td) == false) {
					if ((td.hasClass("national-holiday")) || (i === 0 || i === 6)) {
						td.toggleClass("selected");
					} else {
						td.removeClass("selected");
						//				} if (i==0 || i==6) {
						//					td.addClass("selected");
					}
				}
			}
		});
		$('.js-weekday').prop('checked', false);
		if (selectHolidays.is(':checked')) {
			$holiday.prop('checked', true).change();
		} else {
			$holiday.prop('checked', false).change();
		}
		selectedCheck();
	});
	/*----------------------------------------------------
	 //カレンダー平日選択
	 ----------------------------------------------------*/

	var selectWeekdays = $("#js-selectWeekdays, #js-selectWeekdays2");
	selectWeekdays.on('click', function () {
		var checked = selectWeekdays.is(':checked');
		$('.js-weekday').prop('checked', checked) /*.change()*/ ;
		$(".js-price_calender__row").each(function () {
			for (var i = 0; i <= 6; i++) {
				var td = $(this).find($("#price_calender .frame, #publish_calender .frame")).eq(i);
				if(calenderCheckDisable(td) == false){
					if (td.hasClass("national-holiday")) {
						td.removeClass("selected");
					} else {
						td.toggleClass("selected");
					}
					if (i === 0 || i === 6) {
						td.removeClass("selected");
					}
				}
			}
			$holiday.prop('checked', false);
			if (selectWeekdays.is(':checked')) {
				$(' .js-weekday').find('td').eq(selectWeekdays).not(".js-national-holiday").prop('checked', true).change();
			} else {
				$(' .js-weekday').prop('checked', false).change();
			}
			selectedCheck();
		});

	});

	/*----------------------------------------------------
	 calender modal
	 ----------------------------------------------------*/
	//$('.ag__calender__price__edit, .ag__calender__launch__edit').on('click', function () {
	//	$('#ag__calender__modal__bg').fadeIn(200, function () {
	//		$('#ag__calender__modal').fadeIn(200);
	//	});
	//	return false;
	//});

	$('.ag__calender__modal__close').on('click', function () {
		$('#ag__calender__modal').fadeOut(200, function () {
			$('#ag__calender__modal__bg').fadeOut(200);
		});
		return false;
	});
	/*----------------------------------------------------
	 カレンダー前月翌月
	 ----------------------------------------------------*/
	$('.ag__calender__prev a').on('click', function () {
		return false;
	});
	$('.ag__calender__next a').on('click', function () {
		return false;
	});
	/*----------------------------------------------------
	 サイドバー固定
	 ----------------------------------------------------*/
	$(window).on('load', function () {
		var fix = $('#sub'), //固定したいコンテンツ
				side = $('#sub'), //サイドバーのID
				headerHeight = 285, //固定ヘッダーの高さ
				w = $(window);

		var adjust = function () {
			if ($('#sub').length) {
				var sideTop = side.get(0).offsetTop - headerHeight,
						fixTop = fix.get(0).offsetTop;
				fixTop = fix.css('position') === 'static' ? sideTop + fix.position().top : fixTop;
			}
			var winTop = w.scrollTop();
			if (winTop >= fixTop && winTop >= 55) {
				fix.addClass('sidebar-fixed');
			} else {
				fix.removeClass('sidebar-fixed');
			}
		};
		w.on('scroll', adjust);
	});

	/*----------------------------------------------------
	 anchor
	 ----------------------------------------------------*/
	var _pageup = $('#pageup');
	$('a[href^="#"]').on('click', function () {
		var speed = 1000;
		var href = $(this).attr('href');
		var target = $(href === '#' || href === '' ? 'html' : href);
		var position = target.offset().top - 60;
		body.animate({
			scrollTop: position
		}, speed, 'easeOutQuint');
		return false;
	});
	/*----------------------------------------------------
	 input data-group判定◯
	 ----------------------------------------------------*/
	function funnel($el, selector) {
		var bool;
		if ($el.data('group') === undefined) {
			bool = $el.is(':disabled');
		} else {
			var $els = $(selector + '[data-group=' + $el.data('group') + ']');
			$els.each(function () {
				if ($(this).is(':disabled')) {
					bool = true;
				}
			});
		}
		return bool;
	}
	/*----------------------------------------------------
	 チェックボックス 判定
	 ----------------------------------------------------*/
	var $checkBox = $('input[type="checkbox"][data-target^="#icon"]');
	$checkBox.on("click", function () {
		var flag = ($checkBox.filter(':checked').length > 0) ? 'addClass' : 'removeClass';
		$($(this).attr('data-target'))[flag]('selected');
	});
	/*----------------------------------------------------
	 タブ切り替え時の中身の状態の確認
	 ----------------------------------------------------*/
	var $tabText = $('input[type="text"][data-target^="#icon"]');
	var checkSelectFlag = function (type) {
		// var _target = $('div[data-tabbody="' + type + '"]').find('input[type="text"][data-target^="#icon"]');
		var _select = $('div[data-tabbody="' + type + '"]').find('select[data-target^="#icon"]');
		var _item = $('div[data-tabbody="' + type + '"]').find('.tab__item');

		for (var i = 0; i < _item.length; i++) {
			var _inputText = _item.eq(i).find('input[type="text"]');
			var _inputTextLen = _inputText.length;
			for (var n = 0; n < _inputTextLen; n++) {
				if (_inputText.eq(n).val().length > 0) {
					_flag = 'addClass';
					$(_inputText.eq(n).attr('data-target'))[_flag]('selected');
					break;
				} else {
					_flag = 'removeClass';
					$(_inputText.eq(n).attr('data-target'))[_flag]('selected');
				}
			}

			var _inputRadio = _item.eq(i).find('input[type="radio"]');
			var _inputRadioLen = _inputRadio.length;
			for (var n = 0; n < _inputRadioLen; n++) {
				if (_inputRadio.eq(n).prop('checked')) {
					$(_inputRadio.eq(n).attr('data-target'))['addClass']('selected');
					break;
				} else {
					$(_inputRadio.eq(n).attr('data-target'))['removeClass']('selected');
				}
			}

			var _inputCheck = _item.eq(i).find('input[type="checkbox"]');
			var _inputCheckLen = _inputCheck.length;
			for (var n = 0; n < _inputCheckLen; n++) {
				if (_inputCheck.eq(n).prop('checked')) {
					$(_inputCheck.eq(n).attr('data-target'))['addClass']('selected');
					break;
				} else {
					$(_inputCheck.eq(n).attr('data-target'))['removeClass']('selected');
				}
			}

			var _inputTextArea = _item.eq(i).find('textarea');
			var _inputTextAreaLen = _inputTextArea.length;
			for (var n = 0; n < _inputTextAreaLen; n++) {
				if (_inputTextArea.eq(n).val().length > 0) {
					$(_inputTextArea.eq(n).attr('data-target'))['addClass']('selected');
					break;
				} else {
					$(_inputTextArea.eq(n).attr('data-target'))['removeClass']('selected');
				}
			}
		}
		for (var i = 0; i < _select.length; i++) {
			var _f = (_select.eq(i).attr('disabled')) ? 'removeClass' : 'addClass';
			$(_select.eq(i).attr('data-target'))[_f]('selected');
		}
	};
	var clearTabChecked = function (type) {
		var $target = $('div[data-tabbody="' + type + '"]').find('input[data-target^="#icon"], select[data-target^="#icon"], textarea[data-target^="#icon"]');
		for (var i = 0; i < $target.length; i++) {
			$($target.eq(i).attr('data-target'))['removeClass']('selected');
		}
	};
	/*----------------------------------------------------
	 tab
	 ----------------------------------------------------*/
	$('.tab nav ul li, .overlay__tab__header nav ul li').on('click', function () {
		var _status = $(this).attr('data-status');
		if (_status !== "disable") {
			clearTabChecked($(this).parent().find('.selected').attr('data-tab'));
			if (!$(this).attr('class')) {
				$(this).parent().find('li').removeClass('selected');
				$(this).addClass('selected');
			}
			var _type = $(this).attr('data-tab');
			$(this).parent().parent().parent().parent().find('div[data-tabbody]').hide();
			$(this).parent().parent().parent().parent().find('div[data-tabbody]').removeClass('tabActive');
			$('div[data-tabbody="' + _type + '"]').show();
			$('div[data-tabbody="' + _type + '"]').addClass('tabActive');
		}
		checkSelectFlag(_type);
	});
	/*----------------------------------------------------
	 ラジオボタン判定
	 ----------------------------------------------------*/
	var $radio = $('input[type="radio"][data-target^="#icon"]');
	$radio.on("click", function () {
		var flag = ($(this).prop('checked')) ? 'addClass' : 'removeClass';
		$($(this).attr('data-target'))[flag]('selected');
	});

	/*----------------------------------------------------
	 同じnameの時トグル判定するラジオボタン
	 ----------------------------------------------------*/
	$radio.on("click", function () {
		$('input[name="radioCancelable"]').each(function (i, elem) {
			var $flag = ($(elem).prop('checked')) ? 'addClass' : 'removeClass';
			$($(elem).attr('data-target'))[$flag]('selected');
		});
	});
	/*----------------------------------------------------
	 解除できるラジオボタン
	 ----------------------------------------------------*/
	var $cancelable = $('input[name="radioCancelable"]:checked').val();
	$('input[name="radioCancelable"]').on('click', function () {
		if ($(this).val() === $cancelable) {
			$(this).prop('checked', false);
			$cancelable = false;
			$($(this).attr('data-target')).removeClass('selected');
		} else {
			$cancelable = $(this).val();
			$($(this).attr('data-target')).addClass('selected');
		}
	});
	/*----------------------------------------------------
	 テキストエリア判定◯
	 ----------------------------------------------------*/
	var $text = $('input[type="text"][data-target^="#icon"], textarea[data-target^="#icon"]');
	$text.on('keyup', function () {
		var $flg = $('[data-target="' + $(this).attr('data-target') + '"]').filter(function () {
					return $(this).val() !== "";
				}).length > 0;
		$($(this).attr('data-target')).toggleClass('selected', $flg);
	});
	/*----------------------------------------------------
	 セレクトボックス判定◯
	 ----------------------------------------------------*/
	var selectBox = $('select[data-target^="#icon"]');
	selectBox.on("change", function () {
		funnel($(this), 'select');
		if ($(this).is(':visible')) {
			if (funnel($(this), 'select') === false) {
				$($(this).attr('data-target')).addClass("selected");
			} else {
				$($(this).attr('data-target')).removeClass("selected");
			}
		}
	});
	selectBox.change();
	/*----------------------------------------------------
	 input type="date"判定◯
	 ----------------------------------------------------*/
	var $date = $('input[type="date"][data-target^="#icon"]');
	$date.on('change', function () {
		funnel($(this), 'input');
		if (funnel($(this), 'input') === false) {
			$($(this).attr('data-target')).addClass("selected");
		} else {
			$($(this).attr('data-target')).removeClass("selected");
		}
	});
	/*----------------------------------------------------
	 チェック外しでセレクトボックス活性化
	 ----------------------------------------------------*/
	var target = $('#js-release-valid, #js-release-valid2');
	var valid = $("#launch__reserve__start__check");
	//target.prop('disabled', true);
	valid.on('click', function () {
		if ($(this).prop('checked') === true) {
			target.prop('disabled', true);
			$("#js-release-valid2").val($("#js-release-valid2 option:first").val());
		} else {
			target.prop('disabled', false);
		}
	});
	/*----------------------------------------------------
	 ラジオボタンでセレクトボックス活性化
	 ----------------------------------------------------*/
	var targetRound = $('select[name="selectCourse"], input[name="roundRange"], input[name="clearRange"], button[name="planTemplete"]');
	var valid1 = $("#launch__setting__type__1, #launch__setting__type__3");
	var valid2 = $("#launch__setting__type__2");
	if (valid1.is(":checked")){
		targetRound.prop('disabled', true);
	} else {
		targetRound.removeAttr("disabled");
	}
	valid1.on('click', function () {
		targetRound.attr("disabled", "disabled");
	});
	valid2.on('click', function () {
		targetRound.removeAttr("disabled");
	});
	var targetSelect = $('select[name="extendPeriod"]');
	var valid3 = $("#launch__auto__type__1");
	var valid4 = $("#launch__auto__type__2");
	//targetSelect.prop('disabled', true);
	valid3.on('click', function () {
		targetSelect.attr("disabled", "disabled");
	});
	valid4.on('click', function () {
		targetSelect.removeAttr("disabled");
	});
	/*----------------------------------------------------
	 同じnameの時トグル判定するラジオボタン2(税込、税抜き)
	 ----------------------------------------------------*/
	var $tax = $('input[type="radio"][data-target^="#price__"]');
	$tax.on("click", function () {
		$('input[name="play__style__ag"]').each(function (i, elem) {
			var $flag = ($(elem).prop('checked')) ? 'removeClass' : 'addClass';
			$($(elem).attr('data-target'))[$flag]('hidden');
		});
	});
	/*----------------------------------------------------
	 全角→半角に自動変換
	 ----------------------------------------------------*/

	$('.input-char-halfsize').on('change blur',function () {
		var text = $(this).val();
		var char = text.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function (s) {
			return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
		});
		$(this).val(char);
	});
	/*----------------------------------------------------
	 半角→全角に自動変換
	 ----------------------------------------------------*/
	$('.input-char-fullsize').on('change blur', function () {
		var text = $(this).val();
		var char = text.replace(/[A-Za-z0-9]/g, function (s) {
			return String.fromCharCode(s.charCodeAt(0) + 0xFEE0);
		});
		$(this).val(char);
	});

	/* Validate date input
	$(document).on('blur','#js-release-valid',function () {
		var $this=$(this);
		var min=parseInt($this.attr('min').replace(/-/g,'') + $('#js-release-valid2').val().replace(/:/g,''));
		var value=parseInt($this.val().replace(/-/g,'')  + $('#js-release-valid2').val().replace(/:/g,''));

		if(value < min){
			UIkit.modal.confirm("設定時間をすぎているので即時公開されますがよろしいですか。", function() {
				$('#launch__reserve__start__check').prop('checked',true);
				$('#js-release-valid2').val('00:00').prop('disabled',true);
				$this.prop('disabled',true).val('');
			},{center: true, labels: {Ok: 'OK', Cancel: 'キャンセル'}});
		}
		else if(value == min){
			$('#js-release-valid2').trigger('change');
		}
	});

	$(document).on('change','#js-release-valid2',function () {
		var now = moment().format('H:mm');
		var $this=$(this);
		var min=parseInt($('#js-release-valid').attr('min').replace(/-/g,'') + now.replace(/:/g,''));
		var value=parseInt($('#js-release-valid').val().replace(/-/g,'')  + $this.val().replace(/:/g,'') );

		if(value < min){
			UIkit.modal.confirm("設定時間をすぎているので即時公開されますがよろしいですか。", function() {
				$('#launch__reserve__start__check').prop('checked',true);
				$('#js-release-valid2').val('00:00').prop('disabled',true);
				$('#js-release-valid').val('').prop('disabled',true);
			},{center: true, labels: {Ok: 'OK', Cancel: 'キャンセル'}});

		}
	});
	 */
});
