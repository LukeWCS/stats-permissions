/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Note: This extension is 100% genuine handcraft and consists of selected
*       natural raw materials. There was no AI involved in making it.
*
*/

(function ($) {

'use strict';

var constants = Object.freeze({
	OpacityEnabled	: '1.0',
	OpacityDisabled	: '0.35',
});

function setState() {
	const c = constants;

	dimOptionGroup('stats_permissions_use_permissions',
		$('[name="stats_permissions_admin_mode"]').prop('checked')
	);

	$('.simple_permissions').css('opacity',
		$('[name="stats_permissions_admin_mode"]').prop('checked')
		|| $('[name="stats_permissions_use_permissions"]').prop('checked')
		? c.OpacityDisabled : c.OpacityEnabled
	);
};

function dimOptionGroup(elememtName, dimCondition) {
	const c = constants;

	$('[name="' + elememtName + '"]').parents('dl').css('opacity', dimCondition ? c.OpacityDisabled : c.OpacityEnabled);
}

function setDefaults() {
	setSwitch('[name="stats_permissions_admin_mode"]',				false);
	setSwitch('[name="stats_permissions_use_permissions"]',			false);
	setSwitch('[name="stats_permissions_perm_for_guests_stats"]',	true);
	setSwitch('[name="stats_permissions_perm_for_guests_newest"]',	false);
	setSwitch('[name="stats_permissions_perm_for_bots_stats"]',		false);
	setSwitch('[name="stats_permissions_perm_for_bots_newest"]',	false);

	setState();
};

function setSwitch(selector, checked) {
	const $elementObject	= $(selector);
	const elementType		= $elementObject.attr('type');

	if (elementType == 'checkbox') {
		$elementObject.prop('checked', checked);
	} else if (elementType == 'radio') {
		$elementObject.filter('[value="' + (checked ? 1 : 0) + '"]').prop('checked', true);
	}
};

function formReset() {
	setTimeout(function() {
		setState();
	});
};

$(function() {
	setState();

	$('[name="stats_permissions_admin_mode"]')		.on('change',	setState);
	$('[name="stats_permissions_use_permissions"]')	.on('change',	setState);
	$('[name="stats_permissions_defaults"]')		.on('click',	setDefaults);
	$('#stats_permissions_form')					.on('reset',	formReset);
});

})(jQuery);
