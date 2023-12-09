/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

(function ($) {	// IIFE start

'use strict';

var constants = Object.freeze({
	PermNothing		: 0,
	PermStats		: 1,
	PermUsers		: 2,
	PermStatsUsers	: 3,

	OpacityEnabled	: '1.0',
	OpacityDisabled	: '0.35',
});

function setState() {
	dimOptionGroup('stats_permissions_use_permissions',
		$('[name="stats_permissions_admin_mode"]').prop('checked')
	);
	dimOptionGroup('stats_permissions_disp_for_guests',
		$('[name="stats_permissions_admin_mode"]').prop('checked')
		|| $('[name="stats_permissions_use_permissions"]').prop('checked')
	);
	dimOptionGroup('stats_permissions_disp_for_bots',
		$('[name="stats_permissions_admin_mode"]').prop('checked')
		|| $('[name="stats_permissions_use_permissions"]').prop('checked')
	);
};

function dimOptionGroup(elememtName, dimCondition) {
	var c = constants;

	$('[name="' + elememtName + '"]').parents('dl').css('opacity', dimCondition ? c.OpacityDisabled : c.OpacityEnabled);
}

function setDefaults() {
	var c = constants;

	setSwitch(	'[name="stats_permissions_admin_mode"]',						false);
	setSwitch(	'[name="stats_permissions_use_permissions"]',					false);
	$(			'[name="stats_permissions_disp_for_guests"]')	.prop('value',	c.PermStats);
	$(			'[name="stats_permissions_disp_for_bots"]')		.prop('value',	c.PermNothing);

	setState();
};

function setSwitch(selector, checked) {
	var $elementObject = $(selector);

	if ($elementObject.get(0).type == 'checkbox') {
		$elementObject.prop('checked', checked);
	} else if ($elementObject.get(0).type == 'radio') {
		$('[name="' + $elementObject[0].name + '"][value="' + (checked ? 1 : 0) + '"]').prop('checked', true);
	}
};

function formReset() {
	setTimeout(function() {
		setState();
	});
};

$(window).ready(function() {
	setState();

	$('[name="stats_permissions_admin_mode"]')		.on('change',	setState);
	$('[name="stats_permissions_use_permissions"]')	.on('change',	setState);
	$('[name="stats_permissions_defaults"]')		.on('click',	setDefaults);
	$('#stats_permissions_form')					.on('reset',	formReset);
});

})(jQuery);	// IIFE end
