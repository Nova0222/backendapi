/*
 * jQuery mSwitch v.1
 *
 * Copyright (c) 2018 Dario Montalbano
 * 
 * For use this library is necessary include jquery-ui autocomplete in your project 
 * 
 */

(function($) {

	$.fn.extend({
		mSwitch: function(params) {
			
			var elements;
			params = $.extend({}, $.mSwitch.defaults, params);
			
			if (this && this.length > 0){
				elements = this.each(function() {
					new $.mSwitch(this, params);
				});

				if (params.onRendered && typeof params.onRendered == 'function'){
					params.onRendered($(this));
				}
			}

			return elements;

		}
	});
	
	$.mSwitch = function(_this, params) {
		if ($(_this) && $(_this).is(":checkbox")){
			$(_this).addClass("m_switch_check");
			var element_parent = $(_this).parent();
			var element = $(_this).detach().html();
			var $div = $("<div/>").attr("class", "m_switch");
			var $b = $("<b/>").attr("class", "m_switch_b m_switch_element");				
			$b.appendTo($div);
			$(_this).detach().prependTo($div);
			element_parent.append($div);

			if ($(_this).is(":checked")){
				$.mSwitch.turnOn($(_this));
			}else{
				$.mSwitch.turnOff($(_this));
			}

			if (params.onRender && typeof params.onRender == 'function'){
				params.onRender($(_this));
			}

			$(_this).change(function(){
				if ($(_this).is(":checked")){
					if (params.onTurnOn && typeof params.onTurnOn == 'function'){
						params.onTurnOn($(this));
					}
					$.mSwitch.turnOn($(this));
				}else if (!$(_this).is(":checked")){
					if (params.onTurnOff && typeof params.onTurnOff == 'function'){
						params.onTurnOff($(this));
					}
					$.mSwitch.turnOff($(this));
				}
			});
		}
	}
	
	$.mSwitch.turnOn = function(elem){
		if (elem.parent(".m_switch").length > 0){
			if (!elem.parent(".m_switch").hasClass("m_switch_color")){
				elem.parent(".m_switch").addClass("m_switch_color");
			}
		}
		if (elem.next("b.m_switch_b").length > 0){
			if (!elem.next("b.m_switch_b").hasClass("m_switch_checked")){
				elem.next("b.m_switch_b").addClass("m_switch_checked");
			}
		}
		if (elem.parent(".m_switch").hasClass("m_switch_color") &&
				elem.next("b.m_switch_b").hasClass("m_switch_checked")){
				elem.attr('checked', true);
		}
	}
	
	$.mSwitch.turnOff = function(elem){
		if (elem.parent(".m_switch").length > 0){
			if (elem.parent(".m_switch").hasClass("m_switch_color")){
				elem.parent(".m_switch").removeClass("m_switch_color");
			}
		}
		if (elem.next("b.m_switch_b").length > 0){
			if (elem.next("b.m_switch_b").hasClass("m_switch_checked")){
				elem.next("b.m_switch_b").removeClass("m_switch_checked");
			}
		}
		if (!elem.parent(".m_switch").hasClass("m_switch_color") &&
				!elem.next("b.m_switch_b").hasClass("m_switch_checked")){
				elem.attr('checked', false);
		}
	}

	$.mSwitch.isOn = function(elem){
		var res = false;
		if (elem.is(":checked")){
				res = true;
		}
		return res;
	}
	
	$.mSwitch.defaults = {
		onRendered: function(){},
		onRender: function(elem){},
		onTurnOn: function(elem){
			return true;
		},
		onTurnOff: function(elem){
			return true;
		}
	}
	
}(jQuery));
